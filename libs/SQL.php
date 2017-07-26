<?php 


class SQL 
{
    protected $query;

    public function select($fields)
    {
       if ($fields != '*')
           {
   $this->query .= 'SELECT '.implode(',', $fields);
        return $this;
           }
           else
           {
            throw new Exception('ERROR');
           }
         }

    public function from($table, $alias)
    {
       $this->query .= ' FROM '.$table.' AS '.$alias.' ';
        return $this;
    }

    public function where($condition)
    {
       
        $this->query .= ' WHERE '.implode('=', $condition);
        return $this;
    }

     public function set (array $fields)
    {
        $this->query .= ' SET '.implode('=', $fields);
    }

     public function values ($fields, $values)
    {
        $this->query .= '('.implode(',', $fields).') VALUES ('.implode(',', $values).')';
        return $this;
    }
    public function insert($table)
    {
       $this->query .= 'INSERT INTO '.$table;
       return $this;
    }
    
    public function update()
    {
       $this->query .= 'UPDATE ';
       return $this;
    }

    public function delete()
    {
        $this->query .= 'DELETE FROM ';
        return $this;
    }

    public function __toString()
    {
        return $this->query;
    }

}
?>
