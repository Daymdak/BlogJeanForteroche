<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function controlPanel()
{
	if (isset($_SESSION['admin'])){
		$commentManager = new \JeanForteroche\Blog\Model\CommentManager();
		$postManager = new \JeanForteroche\Blog\Model\PostManager();

		$reportedComments = $commentManager->getReportedComments();
		$lastPosts = $postManager->getPosts(0, 5);

		require('view/backend/adminView.php');
	}
	else {
		header('Location: index.php');
	}
}

function removeComment($id)
{
	if (isset($_SESSION['admin'])){
		if (isset($id) && $id > 0)
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
		else {
			throw new Exception('Aucun identifiant valide renseigné.');
		}
	}
	else {
		header('Location: index.php');
	}
}

function addPostView()
{
	if (isset($_SESSION['admin'])){
		require('view/backend/addPostView.php');
	}
	else {
		header('Location: index.php');
	}
}

function addPost($title, $post)
{
	if (isset($_SESSION['admin'])){
		$postManager = new \JeanForteroche\Blog\Model\PostManager();

		if (!empty($title) && !empty($post)) {
			$postManager->newPost($title, $post);
			header('Location: index.php?action=controlPanel');
		}
		else {
			throw new Exception('Impossible d\'ajouter un nouveau billet');
		}
	}
	else {
		header('Location: index.php');
	}
}

function allPostsView()
{
	if (isset($_SESSION['admin'])){
		$postManager = new \JeanForteroche\Blog\Model\PostManager();

		$getAllPosts = $postManager->getAllPosts();

		require('view/backend/allPostsView.php');
	}
	else {
		header('Location: index.php');
	}
}

function allCommentsView()
{
	if (isset($_SESSION['admin'])){
		$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

		$getAllComments = $commentManager->getAllComments();

		require('view/backend/allCommentsView.php');
	}
	else {
		header('Location: index.php');
	}
}

function updatePostView($id)
{
	if (isset($_SESSION['admin'])){
		if (isset($id) && $id > 0)
		{
			$postManager = new \JeanForteroche\Blog\Model\PostManager();
			$getPost = $postManager->getPost($id);
			require('view/backend/updatePostView.php');
		}
		else {
			throw new Exception('Aucun identifiant valide renseigné.');
		}
	}
	else {
		header('Location: index.php');
	}
}

function updatePost($id, $title, $post)
{
	if (isset($_SESSION['admin'])){
		if (isset($id) && $id > 0) {
			if (!empty($id) && !empty($title) && !empty($post)) {
			$postManager = new \JeanForteroche\Blog\Model\PostManager();
			$postManager->changePost($id, $title, $post);
			header('Location: index.php?action=controlPanel');
			}
			else {
				throw new Exception('Impossible de mettre à jour le billet !');
			}
		}
		else {
			throw new Exception('Aucun identifiant valide renseigné.');
		}
	}
	else {
		header('Location: index.php');
	}
}

function deletePost($id)
{
	if (isset($_SESSION['admin'])){
		if (isset($id) && $id > 0)
		{
			$postManager = new \JeanForteroche\Blog\Model\PostManager();
			$removePost = $postManager->removePost($id);
			if ($removePost === false) {
				throw new Excepetion('Impossible de supprimer le billet');
			}
			else {
				header('Location: index.php?action=controlPanel');
			}
		}
		else {
			throw new Exception('Aucun identifiant valide renseigné.');
		}
	}
	else {
		header('Location: index.php');
	}
}

function postView($id)
{
	if (isset($_SESSION['admin'])) {
		if (isset($id) && $id > 0){
			$postManager = new \JeanForteroche\Blog\Model\PostManager();
			$getPost = $postManager->getPost($id);
			require('view/backend/postView.php');
		}
		else {
			throw new Excepetion('Aucun identifiant valide renseigné.');
		}
	}
	else {
		header('Location: index.php');
	}
}