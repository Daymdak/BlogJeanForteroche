<?php $title = $getPost['title'] ?>

<?php ob_start(); ?>
<div class="entirePost">
	<h2><?= $getPost['title'] ?></h2>
	<p><?= $getPost['content'] ?></p>
	<p><em>Posté le <?= $getPost['creation_date_fr'] ?></em></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>