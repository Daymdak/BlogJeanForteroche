<?php $title="Voir tous les billets" ?>

<?php ob_start(); ?>
<h2>Tous les billets</h2>
<table>
	<tr class="tableHeader">
		<th>Titre</th>
		<th>Extrait</th>
		<th>Date de publication</th>
		<th>Modifier/Supprimer</th>
	</tr>
	<?php
	while ($getAllPost = $getAllPosts->fetch())
	{
	?>
	<tr>
		<td><?= $getAllPost['title']?></td>
		<td>
			<?php
			$extract = explode(' ', trim($getAllPost['content']));
			for ($i = 0; $i < 40; $i++)
			{
				if (!empty($extract[$i]))
				{
					echo $extract[$i] . ' ';
				}
			}
			?>
			... <a href="index.php?action=postView&amp;id=<?= $getAllPost['id'] ?>">Lire la suite</a>
		</td>
		<td><?= $getAllPost['creation_date_fr']?></td>
		<td><p><a href="index.php?action=updatePostView&amp;id=<?= $getAllPost['id'] ?>"><i class="fas fa-edit fa-lg"></i></a></p><p><a href="index.php?action=deletePost&amp;id=<?= $getAllPost['id'] ?>"><i class="far fa-trash-alt fa-lg"></i></a></p></td>
	</tr>
	<?php
	}
	?>
</table>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>