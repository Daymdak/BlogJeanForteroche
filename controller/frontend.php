<?php

require_once('model/PostManager.php');

function listPosts()
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();
	$posts = $postManager->getPosts();

	require('view/frontend/listPostsView.php');
}