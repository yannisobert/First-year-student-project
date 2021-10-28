<?php

include('../../../inc/connect.php');

$id = $_GET['id'];
$pdo->exec("DELETE FROM article WHERE id_article = '$id' ");

header('Location: article.php');



