<?php
    spl_autoload_register(function ($class_name) {
        require_once 'libs/'.$class_name . '.php';
    });

    try
    {
        echo (new Sql())
            ->insert('MY_TABLE')
            ->values(['id' => 1, 'name' => 'test'])
            ->execute().'<br>';

        echo (new Sql())
            ->select('MY_TABLE', ['id', 'name'])
            ->where(['id' => 1])
            ->execute().'<br>';

        echo (new Sql())
            ->update('MY_TABLE', ['id', 'name'])
            ->set(['name', 'test2'])
            ->where(['id' => 1])
            ->execute().'<br>';

        echo (new Sql())
            ->delete('MY_TABLE')
            ->where(['id' => 1])
            ->execute();

    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }

    ?>
