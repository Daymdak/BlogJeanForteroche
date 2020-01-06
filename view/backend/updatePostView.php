<?php $title="Modifier un billet" ?>

<?php ob_start(); ?>

<h2>Modifier un billet</h2>
<form action="index.php?action=updatePost&amp;id=<?= $_GET['id'] ?>" method="POST">
	<p><label for="title">Titre du billet : </label><input type="text" name="title" id="titleNewPost" <?= 'value="' . $getPost['title'] . '"' ?> required /></p>
	<p><label for="post">Contenu du billet : </label><textarea name="post" required><?= $getPost['content'] ?></textarea></p>
	<input type="submit" value="Publier" />
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php');