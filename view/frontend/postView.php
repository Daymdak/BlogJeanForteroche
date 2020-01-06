<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class="entirePost">
	<h2><?= htmlspecialchars($post['title']) ?></h2>
	<p class="mt-3">
		<?= $post['content'] ?>
	</p>
	<div class="dateAndReturnLink">
		<em>Posté le <?= $post['creation_date_fr'] ?></em>
		<p><a href="index.php">Retour à la liste des billets</a></p>
	</div>
</div>

<h3 class="mt-5">Commentaires</h3>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
	<div>
		<label for="author">Auteur</label><br />
		<input type="text" id="author" name="author" <?php if(isset($_COOKIE['pseudo'])) { echo 'value="' . $_COOKIE['pseudo'] . '"';} ?> maxlength="16" minlength="3" required />
	</div>
	<div>
		<label for="comment">Commentaire</label><br />
		<textarea id="comment" name="comment" maxlength="256" minlength="2" required></textarea>
	</div>
	<div>
		<input type="submit">
	</div>
</form>

<?php
while ($comment = $comments->fetch())
{
?>
	<div class="comment">
		<p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> - <a href="index.php?action=reportComment&amp;id=<?= $comment['id'] ?>&amp;postId=<?= $comment['post_id'] ?>"><i class="fas fa-exclamation-triangle"></i></a></p>
		<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
	</div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>