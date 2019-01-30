<?php

//include 'Connexion.php';
?>

<form action ="AjouterCommentaire.php" method="get">
		<nav >
			<p id="P">
				 <input type="text" name="username" placeholder="Titre"><br>
				 <input type="text" name="content" placeholder="Content"><br>
				 <input type="text" name="article" placeholder="Author"><br>
				 <button type="submit">Ajouter</button>

			</p>
		</nav>
</form>

<?php

$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

$title = $_GET['username'];
$content = $_GET['content'];
$author = $_GET['article'];

$requete = "INSERT INTO commentaire (username, content, article) VALUES ('$title', '$content', '$author');";
$statement = $pdo->prepare($requete);
$statement->execute();