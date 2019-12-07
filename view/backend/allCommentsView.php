<?php $title="Voir tous les commentaires" ?>

<?php ob_start(); ?>
<h2>Tous les commentaires</h2>
<table>
	<tr class="tableHeader">
		<th>Auteur</th>
		<th>Commentaire</th>
		<th>Nombre de signalement</th>
		<th>Date de création</th>
		<th>Supprimer</th>
	</tr>
	<?php
	while ($getAllComment = $getAllComments->fetch())
	{
	?>
		<tr>
			<td><?= htmlspecialchars($getAllComment['author']) ?></td>
			<td>"<?= htmlspecialchars($getAllComment['comment']) ?>"</td>
			<td><?= $getAllComment['reports'] ?> signalement(s)</td>
			<td><?= $getAllComment['comment_date'] ?></td>
			<td><a href="index.php?action=removeComment&amp;id=<?= $getAllComment['id'] ?>"><i class="far fa-trash-alt fa-lg"></i></a></td>
		</tr>
	<?php
	}
	?>
</table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');