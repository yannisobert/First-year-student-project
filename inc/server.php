<?php
    $host = "localhost";
    $dbname = "mon_site";
    $admin = "root";
    $pass = "root";

    try
    {
        $pdo = new PDO("mysql:host=host;dbname=$dbname", $admin, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXEPTION).
    }
    catch(PDOExeption $e)
    {
        die(print_r('erreur bdd:' . $e->getMessage()));
    }

?>