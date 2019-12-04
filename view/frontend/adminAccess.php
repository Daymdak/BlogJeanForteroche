<?php $title = 'Accès à l\'interface d\'administration'; ?>

<?php ob_start(); ?>

<?php

if ((!isset($_POST['password']) || $_POST['password'] != "Apotoxine4869") && !isset($_SESSION['admin']))
{
	?>
		<form action="index.php?action=adminAccess" method="POST">
			<p><label for="password">Saisissez le mot de passe :</label><input type="password" name="password" /></p>
			<input type="submit" value="Envoyer" />
		</form>
		<a href="index.php">Retour à la page d'accueil</a>
	<?php
}
else
{
	$_SESSION['admin'] = true;
	header('Location: index.php?action=controlPanel');
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>