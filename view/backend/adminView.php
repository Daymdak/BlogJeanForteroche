<?php $title = "Page d'administration" ?>

<?php ob_start(); ?>
<div class="container">
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
				<td><a href="#">Supprimer</a></td>
			</tr>
		<?php
		}
		?>
	</table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>