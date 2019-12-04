<?php $title = "Page d'administration" ?>

<?php ob_start(); ?>
	<h2>Ajouter un billet</h2>
	<form action="index.php?action=addPost" method="POST">
		<p><label for="title">Titre du billet : </label><input type="text" name="title" id="titleNewPost" /></p>
		<p><label for="post">Contenu du billet : </label><textarea name="post"></textarea></p>
		<input type="submit" value="Publier" />
	</form>

	<h2>Modération des commentaires</h2>
	<table>
		<tr>
			<th>Auteur</th>
			<th>Commentaire</th>
			<th>Nombre de signalement</th>
			<th>Date de création</th>
			<th>Supprimer le commentaire</th>
		</tr>
		<?php
		while ($reportedComment = $reportedComments->fetch())
		{
		?>
			<tr>
				<td><?= htmlspecialchars($reportedComment['author']) ?></td>
				<td><?= htmlspecialchars($reportedComment['comment']) ?></td>
				<td><?= $reportedComment['reports'] ?></td>
				<td><?= $reportedComment['comment_date'] ?></td>
				<td><a href="index.php?action=removeComment&amp;id=<?= $reportedComment['id'] ?>">Supprimer</a></td>
			</tr>
		<?php
		}
		?>
	</table>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>