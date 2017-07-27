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

    public function select($table, $fields)
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

    public function insert($table)
    {
        $this->insert .= 'INSERT INTO '.$table;
        return $this;
    }

    public function update($table)
    {
        $this->update = 'UPDATE '.$table;
        return $this;
    }

    public function delete($table)
    {
        $this->delete = 'DELETE FROM '.$table;
        return $this;
    }

    public function where($condition)
    {
        if ($this->checkArray($condition))
        {
            foreach($condition as $k=>$val) {

                $arr[]  = $k.' = '.$val;

            }

            $this->where .= ' WHERE '.$arr[0];
            return $this;
        }
    }

    public function set ($fields)
    {
        if ($this->checkArray($fields))
        {
            $this->set = ' SET '.implode(' = ', $fields);
            return $this;
        }

    }

    public function values ($set)
    {
        if ($this->checkArray($set))
        {
            $key    = array_keys($set);
            $values = array_values($set);
            $this->values = ' ('.implode(',', $key).') VALUES ('.implode(',', $values).')';
            return $this;
        }

    }

    private function checkArray ($array)
    {
        if (is_array($array)) {
            return true;
        }
        else
        {
            throw new Exception('argument is not array');
        }
    }


    public function execute()
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
        //return $this->query;
    }

}
?>
