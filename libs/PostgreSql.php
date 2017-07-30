<?php

class PostgreSql extends Sql
{
    private $connect;

    public function __construct()
    {
        if ($this->connect = pg_connect("host=".HOST." port=".PORT." dbname=".DB." user=".USER_PG." password=".PASSWORD_PSQL))
        {
            return $this->connect;
        }
        else
        {
            throw new Exception('Could not connect');
        }

    }

    public function select ($table, $fields)
    {
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

    private function quoteSimpleTableName ($name)
    {
        return strpos($name, '"') !== false ? $name : '"' . $name . '"';
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
            return pg_fetch_row($result);
        }
    }
    
}

?>
