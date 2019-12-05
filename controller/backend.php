<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function controlPanel()
{
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();
	$postManager = new \JeanForteroche\Blog\Model\PostManager();

	$reportedComments = $commentManager->getReportedComments();
	$lastPosts = $postManager->getPosts(0, 5);

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

function allPostsView()
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();

	$getAllPosts = $postManager->getAllPosts();

	require('view/backend/allPostsView.php');
}

function allCommentsView()
{
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$getAllComments = $commentManager->getAllComments();

	require('view/backend/allCommentsView.php');
}

function updatePostView($id)
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();

	$getPost = $postManager->getPost($id);

	require('view/backend/updatePostView.php');
}

function updatePost($id, $title, $post)
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();

	$updatePost = $postManager->changePost($id, $title, $post);

	if ($updatePost === false) {
		throw new Exception('Impossible de mettre à jour le billet');
	}
	else {
		header('Location: index.php?action=controlPanel');
	}
}

function deletePost($id)
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

function postView($id)
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();

	$getPost = $postManager->getPost($id);

	require('view/backend/postView.php');
}