<?php $title = 'Liste des billets - Jean Forteroche'; ?>

<?php ob_start(); ?>
<div id="listPosts">
	<?php
	while ($data = $posts->fetch())
	{
	?>
	<div class="post">
		<strong><?= htmlspecialchars($data['title']) ?></strong>
		posté le <?= $data['creation_date_fr'] ?>

		<p>
			<?php
			$extract = explode(' ', trim($data['content']));
			for ($i = 0; $i < 40; $i++)
			{
				if (!empty($extract[$i]))
				{
					echo $extract[$i] . ' ';
				}
			}
			?>
			... <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="readMoreLink">Lire la suite</a>
		</p>
	</div>
	</div>
	<?php
	}
	?>
</div>
	<div class="paging">
		<?php
		$nbr_page = 0;
		while ($getAllPost = $getAllPosts->fetch()) {
			$nbr_page++;
		}
		$nbr_page = $nbr_page / 5;
		for ($i = 1; $i < $nbr_page + 1; $i++)
		{
		?>
			<a href="index.php?action=listPosts&amp;page=<?= $i ?>"><?= $i ?></a>
		<?php
		}
		?>
	</div>

<?php
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?> 