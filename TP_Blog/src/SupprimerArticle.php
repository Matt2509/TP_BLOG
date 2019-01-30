<?php

$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');


$ID = $_GET['id'];
$requete = "DELETE FROM article WHERE id ='$ID'";
echo "Votre article a été supprimé ! ";
$statement = $pdo->prepare($requete);
$statement->execute();