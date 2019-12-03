<?php $title = 'Liste des billets - Jean Forteroche'; ?>

<?php ob_start(); ?>

<div class="container">
<h1>Blog de Jean Forteroche</h1>
<p>Derniers articles parus :</p>
<?php
while ($data = $posts->fetch())
{
?>
	<div class="news">
		<strong><?= htmlspecialchars($data['title']) ?></strong>
		<em>le <?= $data['creation_date_fr'] ?></em>

		<p>
			<?php
			$extract = explode(' ', trim($data['content']));
			for ($i = 0; $i < 40; $i++)
			{
				echo nl2br(htmlspecialchars($extract[$i]) . ' ');
			}
			?>
			...<a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a>
		</p>
	</div>
<?php
}
$posts->closeCursor();
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?> 