<?php $title = 'Liste des billets - Jean Forteroche'; ?>

<?php ob_start(); ?>

<?php
while ($data = $posts->fetch())
{
?>
	<div class="news">
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
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?> 