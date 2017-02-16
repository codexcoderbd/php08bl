<?php

try 
{
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    $dbname ="php5books";

    $pdo->query('CREATE DATABASE ' .$dbname);
    echo "database created successfully";

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
