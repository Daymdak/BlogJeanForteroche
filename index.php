<?php
session_start();

require('controller/frontend.php');
require('controller/backend.php');

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listPosts') {
			listPosts($_GET['page']);	
		}
		elseif ($_GET['action'] == 'post') {
			post($_GET['id']);			
		}
		elseif ($_GET['action'] == 'addComment') {
			addComment($_GET['id'], $_POST['author'], $_POST['comment']);
		}
		elseif ($_GET['action'] == 'reportComment') {
			reportComment($_GET['postId'], $_GET['id']);
		}
		elseif ($_GET['action'] == 'adminAccess') {
			adminAccess($_POST['password']);
		}
		elseif ($_GET['action'] == 'controlPanel') {
			controlPanel();
		}
		elseif ($_GET['action'] == 'addPostView') {
			addPostView();
		}
		elseif ($_GET['action'] == 'allPostsView') {
			allPostsView();
		}
		elseif ($_GET['action'] == 'allCommentsView') {
			allCommentsView();
		}
		elseif ($_GET['action'] == 'postView') {
			postView($_GET['id']);
		}
		elseif ($_GET['action'] == 'updatePostView') {
			updatePostView($_GET['id']);
		}
		elseif ($_GET['action'] == 'updatePost') {
			updatePost($_GET['id'], $_POST['title'], $_POST['post']);
		}
		elseif ($_GET['action'] == 'removeComment'){
				removeComment($_GET['id']);
		}
		elseif ($_GET['action'] == 'addPost') {
			addPost($_POST['title'], $_POST['post']);
		}
		elseif ($_GET['action'] == 'deletePost') {
				deletePost($_GET['id']);
		}
	}
	else {
		listPosts(1);
	}
}
catch(Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}