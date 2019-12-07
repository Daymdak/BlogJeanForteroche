<?php $title = 'Accès à l\'interface d\'administration'; ?>

<?php ob_start(); ?>

<form action="index.php?action=adminAccess" method="POST">
	<p><label for="password">Saisissez le mot de passe :</label><input type="password" name="password" /></p>
	<input type="submit" value="Envoyer" />
</form>
<a href="index.php">Retour à la page d'accueil</a>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>