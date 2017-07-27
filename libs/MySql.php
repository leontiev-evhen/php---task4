<?php

class MySql
{
    public $connect;
    
    public function connect ()
    {
        if ($this->connect = mysql_connect(HOST, USER, PASSWORD_SQL))
        {
            return $this->connect;
        }
        else
        {
            throw new Exception('ERROR database');
        }
    }
}
?>
