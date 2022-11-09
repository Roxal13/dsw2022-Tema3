<?php
    $host = "db";
    $user = "root";
    $password = "test";
    $db = "storeDB";
    $dsn = "mysql:host=$host; dbname=$db";
    $link = new PDO($dsn, $user, $password);
?>