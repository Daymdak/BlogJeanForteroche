<?php $title = "Ajouter un billet" ?>

<?php ob_start(); ?>

<h2>Ajouter un billet</h2>
<form action="index.php?action=addPost" method="POST">
	<p><label for="title">Titre du billet : </label><input type="text" name="title" id="titleNewPost" /></p>
	<p><label for="post">Contenu du billet : </label><textarea name="post"></textarea></p>
	<input type="submit" value="Publier" />
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>