<?php 


class Sql
{
    protected $query;
    protected $select;
    protected $insert;
    protected $update;
    protected $delete;
    protected $values;
    protected $set;

    protected $where;

    protected function select ($table, $fields)
    {
        if ($this->checkArray($fields))
        {
            if (in_array("*", $fields))
            {
                throw new Exception('Forbidden character');
            }

            $this->select .= 'SELECT '.implode(', ', $fields).' FROM '.$table;
            return $this;
        }
    }

    protected function insert ($table)
    {
        $this->insert .= 'INSERT INTO '.$table;
        return $this;
    }

    protected function update ($table)
    {
        $this->update = 'UPDATE '.$table;
        return $this;
    }

    protected function delete ($table)
    {
        $this->delete = 'DELETE FROM '.$table;
        return $this;
    }

    protected function where ($condition)
    {
        $this->where = ' WHERE '.key($condition).' = '."'".$condition[key($condition)]."'";
        return $this;
    }

    protected function set ($fields)
    {
        if ($this->checkArray($fields))
        {
            foreach($fields as $key=>$val) {
                $arr[] = $key.' = '."'".$val."'";
            }

            $this->set = ' SET '.implode(' , ', $arr);
            return $this;
        }
    }

    protected function values ($set)
    {
        if ($this->checkArray($set))
        {
            foreach ($set as $key=>$value) {
                $aSet[$key] = $this->quoteSimpleColumnName($value);
            }

            $key    = array_keys($aSet);
            $values = array_values($aSet);
            $this->values = ' ('.implode(', ', $key).') VALUES ('.implode(', ', $values).')';
            return $this;
        }
    }

    protected function checkArray ($array)
    {
        if (is_array($array)) {
            return true;
        }
        else
        {
            throw new Exception('argument is not array');
        }
    }

    protected function quoteSimpleColumnName ($name)
    {
        return strpos($name, "'") !== false ? $name : "'" . $name . "'";
    }

    protected function execute()
    {
        switch ($this)
        {
            case !empty($this->insert):
                return $this->insert.$this->values;

            case !empty($this->select):
                return $this->select.$this->values.$this->where;

            case !empty($this->update):
                return $this->update.$this->set.$this->where;

            case !empty($this->delete):
                return $this->delete.$this->where;
        }
    }

}
?>
