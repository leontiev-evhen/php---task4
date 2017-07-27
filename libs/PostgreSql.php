<?php

class PostgeSql extends SQL
{
    public function __construct()
    {
        $dbconn = pg_connect("host=HOST dbname=DB user=USER password=PASSWORD_PSQL")
            or die('Could not connect: ' . pg_last_error());
    }
}

?>
