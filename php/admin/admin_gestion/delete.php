<?php

include('../../../inc/connect.php');

$id = $_GET['id'];
$pdo->exec("DELETE FROM commentaire WHERE id_commentaire = '$id' ");

header('Location: commentaires.php');



