<?php

class MySql extends Sql
{
    private $connect;
    
    public function __construct ()
    {
        if ($this->connect = mysql_connect(HOST, USER, PASSWORD_SQL, DB))
        {
            if (!mysql_select_db(DB, $this->connect))
            {
                throw new Exception('DataBase not exist');  
            }
        }
        else
        {
            throw new Exception('Could not connect');
        }
    }

    public function select ($table, $fields)
    {
        return parent::select($this->quoteSimpleTableName($table), $fields);
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

    public function values ($set)
    {
        $aSet = $this->quoteSimpleColumnsName($set);
        return parent::values($aSet);
    }

    public function where ($condition)
    {
        $aCondition = $this->quoteSimpleColumnsName($condition);
        return parent::where($aCondition);
    }

    public function set ($fields)
    {
        $aFields = $this->quoteSimpleColumnsName($fields);
        return parent::set($aFields);
    }


    private function quoteSimpleTableName ($name)
    {
        return strpos($name, '`') !== false ? $name : '`' . $name . '`';
    }

    private function quoteSimpleColumnsName ($fields)
    {
        foreach ($fields as $key=>$field)
        {
            $key = strpos($key, "`") !== false ? $key : "`" . $key . "`";
            $aFields[$key] = $field;
        }
        return $aFields;
    }

    public function execute()
    {
        $sql = parent::execute();
        $result = mysql_query($sql, $this->connect);
        
        if ($result == false)
        {
            throw new Exception('Mysql query error');
        }
        else
        {
            if (is_resource($result))
            {
                 return mysql_fetch_assoc($result);
            }
            else
            {
                return SUCCESS_MESSAGE;
            }
        }
    }


}
?>
