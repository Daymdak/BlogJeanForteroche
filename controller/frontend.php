<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts($n_page)
{
	if (isset($n_page) && $n_page > 0)
	{
		$postManager = new \JeanForteroche\Blog\Model\PostManager();

		$limit = (($n_page * 5) - 5);
		$posts = $postManager->getPosts($limit, 5);

		$getAllPosts = $postManager->getAllPosts();
	
		require('view/frontend/listPostsView.php');
	}
	else {
		throw new Exception('Aucun numéro de page renseigné.');
	}
}

function post($id)
{
	if (isset($id) && $id > 0)
	{
		$postManager = new \JeanForteroche\Blog\Model\PostManager();
		$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager->getComments($_GET['id']);

		require('view/frontend/postView.php');
	}
	else {
		throw new Exception('Aucun identifiant de billet envoyé');
	}
}

function addComment($postId, $author, $comment)
{
	if (isset($postId) && $postId > 0)
	{
		if (!empty($author) && !empty($comment)) {
		$commentManager = new \JeanForteroche\Blog\Model\CommentManager();
		$commentManager->postComment($postId, $author, $comment);
		setcookie('pseudo', $_POST['author'], time() + 365*24*3600, null, null, false, true);
		header('Location: index.php?action=post&id=' . $postId);
		}
		else {
			throw new Exception('Impossible d\'ajouter le commentaire !');
		}
	}
	else {
		throw new Exception('Aucun identifiant de billet renseigné.');
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

function adminAccess($password)
{
	if ((isset($password) && $password == "Apotoxine-4869") || isset($_SESSION['admin']))
	{
		$_SESSION['admin'] = true;
		header('Location: index.php?action=controlPanel');
	}
	else {
		require('view/frontend/adminAccess.php');
	}
}