1<?php
spl_autoload_register(function ($class_name) {
        require_once 'libs/'.$class_name . '.php';
        });

echo (new SQL())
->insert('MY_TABLE')
->values(['key', 'val'], [1, 'test']);

    ?>
