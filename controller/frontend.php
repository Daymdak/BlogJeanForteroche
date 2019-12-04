<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();
	$posts = $postManager->getPosts();

	require('view/frontend/listPostsView.php');
}

function post()
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$newComment = $commentManager->postComment($postId, $author, $comment);

	if ($newComment === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}

function reportComment($postId, $id)
{
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$reportComment = $commentManager->addReportComment($id);

	if ($reportComment === false) {
		throw new Exception('Impossible de signaler le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}

function adminAccess()
{
	require('view/frontend/adminAccess.php');
}