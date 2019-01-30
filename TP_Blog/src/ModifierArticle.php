<?php
session_start();
$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

$ID = $_GET['IDarticle'];
$Modiftitle = $_GET['titre'];
$Modifcontent = $_GET['content'];
$Modifauthor = $_GET['author'];

$requete = "UPDATE article SET title = '$Modiftitle', content = '$Modifcontent', author = '$Modifauthor' WHERE id = '$ID'";
$statement = $pdo->prepare($requete);
$statement->execute();

echo "Modification de l'article sélectionné : " 
."\n"."Titre -> $Modiftitle" 
."\n".", Content -> $Modifcontent";