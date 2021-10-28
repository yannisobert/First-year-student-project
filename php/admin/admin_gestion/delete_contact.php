<?php

include('../../../inc/connect.php');

$id = $_GET['id'];
$pdo->exec("DELETE FROM contact WHERE id_contact = '$id' ");

header('Location: contact.php');



