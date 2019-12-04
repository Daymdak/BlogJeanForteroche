<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?= $title ?></title>
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/css/style.css" />

		<script type="text/javascript" src="vendor/tinymce/tinymce.min.js"></script>

		<script type="text/javascript">
		    tinyMCE.init({
		      mode : "textareas",
		      language: "fr_FR"
		    });
		</script>
	</head>

	<body>
		<?php require_once("view/backend/header.php"); ?>
		<div class="container">
			<?= $content ?>
		</div>
		<?php require_once("view/backend/footer.php"); ?>
	</body>

</html>