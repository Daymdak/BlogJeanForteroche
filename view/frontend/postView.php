<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class="container">
	<h1>Blog de Jean Forteroche</h1>
	<p><a href="index.php">Retour à la liste des billets</a></p>

	<div class="news">
		<strong><?= htmlspecialchars($post['title']) ?></strong>
		<em>le <?= $post['creation_date_fr'] ?></em>

		<p>
			<?= nl2br(htmlspecialchars($post['content'])) ?>
		</p>
	</div>

	<h2>Commentaires</h2>

	<form>
		<div>
			<label for="author">Auteur</label><br />
			<input type="text" id="author" name="author" />
		</div>
		<div>
			<label for="comment">Commentaire</label><br />
			<textarea id="comment" name="comment"></textarea>
		</div>
		<div>
			<input type="submit">
		</div>
	</form>

	<?php
	while ($comment = $comments->fetch())
	{
	?>
		<p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
		<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
	<?php
	}
	?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>