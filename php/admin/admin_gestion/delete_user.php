<?php

include('../../../inc/connect.php');

$id = $_GET['id'];
$pdo->exec("DELETE FROM users WHERE id = '$id' ");

header('Location: membres.php');



