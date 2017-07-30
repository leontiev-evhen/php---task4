<?php
    require_once 'config.php';
    spl_autoload_register(function ($class_name) {
        require_once 'libs/'.$class_name . '.php';
    });

    try
    {
  /*   (new MySql())
            ->insert('MY_TEST')
            ->values(['key' => 'cr7', 'data' => 'test'])
            ->execute();*/

        $mysql = (new MySql())
            ->select('MY_TEST', ['data'])
            ->where(['key' => 'user11'])
            ->execute();

 /*
        echo (new MySql())
            ->update('MY_TEST')
            ->set(['key' => 'test11-u', 'data' => 'test'])
            ->where(['key' => 'user11'])
            ->execute().'<br>';

        echo (new MySql())
            ->delete('MY_TEST')
            ->where(['key' => 1])
            ->execute();*/

        /*========= Postgresql ===================*/
        /*
                $postgresql = (new PostgreSql())
                        ->select('PG_TEST', ['key', 'data'])
                        ->where(['key' => 'user11-2'])
                     ->execute();


              /*  echo (new PostgreSql())
                        ->insert('PG_TEST')
                        ->values(['key' => 'user11', 'data' => 'test'])
                        ->execute().'<br>';

                echo (new PostgreSql())
                        ->update('PG_TEST')
                        ->set(['key' => 'test11-u', 'data' => 'test'])
                        ->where(['key' => 'user11'])
                        ->execute().'<br>';

               (new PostgreSql())
                    ->delete('PG_TEST')
                    ->where(['key' => 'user11-2'])
                    ->execute();*/

    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }

    require_once 'templates/index.php';

    ?>
