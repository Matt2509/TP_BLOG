<?php session_start();
/*if(isset($_SESSION['id'])) {
 $hey = $_SESSION['id'];
}*/
 $_SESSION['id'] = '3';
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<link rel="stylesheet" type="text/css" href="BlogDeco.css" />
	</head>

	<body>
		<header>Bienvenue sur le Blog de Matisse VARLIN</header>
<form action ="Connexion.php" method="get">
		<nav >
			<p id="P">
				 <input type="text" name="Pseudo" placeholder="Pseudo"><br>
				 <input type="Password" name="MotdePasse" placeholder="Mot de Passe"><br>
				 <button type="submit">Valider</button>

			</p>
		</nav>
</form>
		
	</body>
</html>
<?php

$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');


$Pseudo = $_GET['Pseudo'];
$MDP = $_GET['MotdePasse'];
$ID = "1";

$requete3 = "SELECT id FROM user WHERE usersname = '$Pseudo' and password = '$MDP'";
$reponse = $pdo->query($requete3);
$donn = $reponse->fetch();
$afficheID = $donn['id'];
echo $afficheID;

$author = "2";
$valide = $afficheID;



$vrai = "SELECT  article.id AS IDarticle, title, content FROM article INNER JOIN user ON article.author = user.id WHERE user.usersname = '$Pseudo'";
$statement3 = $pdo->prepare($vrai);
$statement3->execute();



$requete2 = "SELECT * FROM id WHERE /*id = $ID*/ author = $author";
$statement2 = $pdo->prepare($requete2);
$statement2->execute();



if ($valide != "") 
{
?>

<table border="3" backgroudcolor="red">
        <tr> 
            <th colspan="6">Article(s) de <?php echo $Pseudo;?> </th>
        </tr>
        <tr>
            <th>Titre</th>
            <th>content</th>
            <th>Détails</th>
            <th>Modifier l'article</th>
            <th>Supprimer l'article</th>
        </tr>
        <?php while( $data = $statement3->fetch(PDO::FETCH_ASSOC) ) { ?>

            <tr>
                <td><?php echo $data['title']; ?></td>
                <td><?php echo $data['content']; ?></td>
                <td><a href="Articles.php?id=<?= $data['IDarticle'] ?>"> Détails </a></td>
                <td>
					<form action ="ModifierArticle.php" method="get">
						<nav >
							<p id="P">
							 <input type="text" name="titre" placeholder="Titre"><br>
							 <input type="text" name="content" placeholder="Content"><br>
							 <input type="text" name="author" placeholder="Author"><br>
							 <select name ="id"><option value="<?php echo $data['IDarticle']; ?>"></option></select>
				 			 <button type="submit">Modifier</button>
							</p>
						</nav>
					</form>
                </td>
                <td><a href="SupprimerArticle.php?id=<?= $data['IDarticle'] ?>"> Supprimer l'article </a></td>
            </tr>
        <?php }
        $_SESSION['favcolor'] = $data['id']; ?>
        <tr> 
            <td id="green "colspan="6"><a href="AjouterArticle.php?id=<?= $data['IDarticle'] ?>"> Ajouter un article </a></td>
        </tr>
    </table>
<?php
}

else 
{
    echo "Mot de passe ou utlisateur incorrect";
    // 
}
//$_SESSION['id'] = $_GET['id'];
//$_SESSION['favcolor'] = "m";
?>





<?php
/*
 while( $data = $statement2->fetch(PDO::FETCH_ASSOC) ) {
            ?>
            <li>
            	<?=$data['title']." ". $data['content']  ?>
            	<a href="films.php?id=<?= $data['id'] ?>"> Détails </a> 
            	<a href="films.php?id=<?= $data['id'] ?>"> Modifier l'article </a>
            	<a href="films.php?id=<?= $data['id'] ?>"> Supprimer l'article </a>
            </li>
            <?php
//echo '<li>'. "Articles :". $data['id'] . $data['title'] .$data['content'].'</li>';
        }
//print_r($data);
*/
?>


