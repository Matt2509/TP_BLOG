<?php

//include 'Connexion.php';
?>

<form action ="AjouterArticle.php" method="get">
		<nav >
			<p id="P">
				 <input type="text" name="titre" placeholder="Titre"><br>
				 <input type="text" name="content" placeholder="Content"><br>
				 <input type="text" name="author" placeholder="Author"><br>
				 <button type="submit">Ajouter</button>

			</p>
		</nav>
</form>

<?php

$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

$title = $_GET['titre'];
$content = $_GET['content'];
$author = $_GET['author'];

if (isset($title) && isset($content))
{
$requete = "INSERT INTO article (title, content, author) VALUES ('$title', '$content', '$author');";
$statement = $pdo->prepare($requete);
$statement->execute();
}
