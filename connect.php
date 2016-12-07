<?php
    session_start();
    DEFINE('DB_USER', 'barrote');
    DEFINE('DB_PASSWORD', 'ola32');
    DEFINE('DB_HOST', 'localhost:9999');
    DEFINE('DB_NAME', 'bd_test');
    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        OR die ('Could not connect to MySQL' . mysqli_connect_error());
?>