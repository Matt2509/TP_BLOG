<?php
$Pseudo = "0";
$MDP = "0";
$VérifMDP = "0";
?>
<form action ="Inscription.php" method="get">
<nav id="Inscription">
	<p id="P">
		<input type="text" name="Pseudo" placeholder="Pseudo"><br>
		<input type="Password" name="MDP" placeholder="Mot de Passe"><br>
		<input type="Password" name="VérifMDP" placeholder="Valider le Mot de Passe"><br>
		<button type="submit">S'inscrire</button>
	</p>
</nav>
</form>


<?php

$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

$Pseudo = $_GET['Pseudo'];
$MDP = $_GET['MDP'];
$VérifMDP = $_GET['VérifMDP'];

$requete = "INSERT INTO user (usersname, password)  VALUES
 ('$Pseudo', '$MDP');";
$statement = $pdo->prepare($requete);
/*
$requete2 = "SELECT * FROM user";
$statement2 = $pdo->prepare($requete2);
$statement2->execute();
$data = $statement2->fetch(PDO::FETCH_ASSOC) ;
echo '<li>'. "RESULTAT :". $data['id'] . $data['usersname'] .$data['password'].'</li>';
*/







if ($VérifMDP != $MDP) 
{
	echo "vides";
}

else{

	echo("yolo");
	$statement->execute();
	echo "Pseudo :".$Pseudo."\n"."MDP :".$MDP." ".$VérifMDP."<br>";
	echo "\n".$requete;
} 



	/*if (isset($_GET['MDP']) !=  isset($_GET['VérifMDP']))
	{
		echo "PAS BON";
	}*/

?>