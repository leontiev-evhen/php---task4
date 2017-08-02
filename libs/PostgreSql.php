<?php

class PostgreSql extends Sql
{
    private $connect;
    private $pSelect = false;

    public function __construct()
    {
        if (!$this->connect = pg_connect("host=".HOST." port=".PORT." dbname=".DB." user=".USER_PG." password=".PASSWORD_PSQL))
        {
            throw new Exception('Could not connect');
        }

    }

    public function select ($table, $fields)
    {
         $this->pSelect = true;
         return  parent::select($this->quoteSimpleTableName($table), $fields);
    }

    public function insert ($table)
    {
        return parent::insert($this->quoteSimpleTableName($table));
    }

    public function update ($table)
    {
        return parent::update($this->quoteSimpleTableName($table));
    }

    public function delete ($table)
    {
        return parent::delete($this->quoteSimpleTableName($table));
    }

    public function where ($condition)
    {
        return parent::where($condition);
    }
    
    public function values ($set)
    {
        return parent::values($set);
    }
   
   public function set ($fields)
    {
        return parent::set($fields);
    }

    private function quoteSimpleTableName ($name)
    {
       // return strpos($name, '"') !== false ? $name : '"' . $name . '"';
       return $name;
    }

    public function execute()
    {
        $sql = parent::execute();
        $result = pg_query($this->connect, $sql);
        if (!$result)
        {
            throw new Exception('Postgresql query error');
        }
        else
        {
            if ($this->pSelect)
            {
                 return pg_fetch_row($result);
            }
            else
            {
                return SUCCESS_MESSAGE;
            }
        }
    }
    
}

?>
