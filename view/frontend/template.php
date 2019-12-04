<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?= $title ?></title>
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/css/style.css" />
	</head>

	<body>
		<?php require_once("view/frontend/header.php"); ?>
		<div class="container">
			<?= $content ?>
		</div>
		<?php require_once("view/frontend/footer.php"); ?>
	</body>
</html>