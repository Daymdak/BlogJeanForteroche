<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function controlPanel()
{
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$reportedComments = $commentManager->getReportedComments();

	require('view/backend/adminView.php');
}

function removeComment($id)
{
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$removeComment = $commentManager->deleteComment($id);

	if ($removeComment === false) {
		throw new Exception('Impossible de supprimer le commentaire');
	}
	else {
		header('Location: index.php?action=controlPanel');
	}
}

function addPostView()
{
	require('view/backend/addPostView.php');
}

function addPost($title, $post)
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();

	$addPost = $postManager->newPost($title, $post);

	if ($addPost === false) {
		throw new Exception('Impossible d\'ajouter un nouveau billet');
	}
	else {
		header('Location: index.php?action=controlPanel');
	}
}