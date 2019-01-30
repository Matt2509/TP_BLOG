<?php

$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');
$ID='3';
$requete2 = "SELECT username, content FROM commentaire WHERE article = '$ID'";
$statement2 = $pdo->prepare($requete2);
$statement2->execute();
?>

<table border="3" backgroudcolor="red">
		<tr> 
			<th colspan="6">Commentaires de l'article : <?php echo $Pseudo;?> </th>
		</tr>
        <tr>
            <th>content</th>
            <th>Commentaires</th>
        </tr>
        <?php while( $data = $statement2->fetch(PDO::FETCH_ASSOC) ) { ?>

            <tr>
                <td><?php echo $data['content']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><a href="ModifierCommentaire.php?id=<?= $data['IDarticle'] ?>"> Modifier le commentaire </a></td>
            </tr>
        <?php }; ?>
        <tr> 
			<td id="green "colspan="6"><a href="AjouterCommentaire.php?id=<?= $data['IDarticle'] ?>"> Ajouter un commentaire </a></td>
		</tr>
    </table>
<?php
