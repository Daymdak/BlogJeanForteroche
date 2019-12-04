<?php $title = 'Accès à l\'interface d\'administration'; ?>

<?php ob_start(); ?>

<?php

if (!isset($_POST['password']) || $_POST['password'] != "Apotoxine4869")
{
	?>
		<form action="index.php?action=adminAccess" method="POST">
			<p><label for="password">Saisissez le mot de passe :</label><input type="password" name="password" /></p>
			<input type="submit" value="Envoyer" />
		</form>
	<?php
}
else
{
	header('Location: index.php?action=controlPanel');
}