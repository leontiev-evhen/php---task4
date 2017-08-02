<?php
require_once 'config.php';
spl_autoload_register(function ($class_name) {
    require_once 'libs/'.$class_name . '.php';
});

try
{
    /*     $mysql = (new MySql())
           ->insert('MY_TEST')
           ->values(['key' => 'user11', 'data' => 'test'])
           ->execute();*/

    $mysql = (new MySql())
        ->select('MY_TEST', ['data'])
        ->where(['key' => 'test11-u'])
        ->execute();

    
/*       $mysql = (new MySql())
       ->update('MY_TEST')
       ->set(['key' => 'test11-u', 'data' => 'test2'])
       ->where(['key' => 'user11'])
       ->execute();
/*
       $mysql = (new MySql())
       ->delete('MY_TEST')
       ->where(['key' => 'user11'])
       ->execute();*/

    /*========= Postgresql ===================*/

    $postgresql = (new PostgreSql())
        ->select('PG_TEST', ['data'])
        ->where(['key' => 'user11-2'])
        ->execute();

    /*
       $postgresql =  (new PostgreSql())
       ->insert('PG_TEST')
       ->values(['key' => 'user11-2', 'data' => 'test2'])
       ->execute();
*/
  /*    $postgresql =   (new PostgreSql())
    ->update('PG_TEST')
    ->set(['key' => 'test11-u', 'data' => 'test2'])
    ->where(['key' => 'user11'])
    ->execute();
/*
    $postgresql =  (new PostgreSql())
    ->delete('PG_TEST')
    ->where(['key' => 'user11'])
    ->execute();*/

}
catch (Exception $e)
{
    echo $e->getMessage();
}

require_once 'templates/index.php';

?>
