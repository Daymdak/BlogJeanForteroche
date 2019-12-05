<?php $title = "Page d'administration" ?>

<?php ob_start(); ?>
	<h2>Les derniers billets publiés</h2>
	<table>
		<tr>
			<th>Titre</th>
			<th>Extrait</th>
			<th>Date de publication</th>
			<th>Modifier/Supprimer</th>
		</tr>
		<?php
		while ($lastPost = $lastPosts->fetch())
		{
		?>
			<tr>
				<td><?= $lastPost['title']?></td>
				<td>
					<?php
					$extract = explode(' ', trim($lastPost['content']));
					for ($i = 0; $i < 40; $i++)
					{
						if (!empty($extract[$i]))
						{
							echo $extract[$i] . ' ';
						}
					}
					?>
					... <a href="#">Lire la suite</a>
				</td>
				<td><?= $lastPost['creation_date_fr']?></td>
				<td><p><a href="index.php?action=updatePostView&amp;id=<?= $lastPost['id'] ?>">Modifier</a></p><p><a href="index.php?action=deletePost&amp;id=<?= $lastPost['id'] ?>">Supprimer</a></p></td>
			</tr>
		<?php
		}
		?>
	</table>

	<h2>Commentaires signalés</h2>
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