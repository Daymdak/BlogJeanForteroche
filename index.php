<?php
session_start();

require('controller/frontend.php');
require('controller/backend.php');

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listPosts') {
			if (isset($_GET['page']) && $_GET['page'] > 0){
				listPosts($_GET['page']);	
			}
			else {
				listPosts(1);
			}
			
		}
		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				post();
			}
			else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_POST['author']) && !empty($_POST['comment'])) {
					setcookie('pseudo', $_POST['author'], time() + 365*24*3600, null, null, false, true);
					addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
				else {
					throw new Exception('Tous les champs ne sont pas remplis !');
				}
			}
			else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET['action'] == 'reportComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (isset($_GET['postId']) && $_GET['postId'] > 0) {
					reportComment($_GET['postId'], $_GET['id']);
				}
				else {
					throw new Exception('Aucun identifiant de billet envoyé');
				}
			}
			else {
				throw new Exception('Aucun identifiant de commentaire envoyé');
			}
		}
		elseif ($_GET['action'] == 'adminAccess') {
			adminAccess();
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
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				postView($_GET['id']);
			}
			else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET['action'] == 'updatePostView') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				updatePostView($_GET['id']);
			}
			else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET['action'] == 'updatePost') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_POST['title']) && !empty($_POST['post']))
				{
					updatePost($_GET['id'], $_POST['title'], $_POST['post']);
				}
				else {
					throw new Exception('Tous les champs ne sont pas remplis');
				}
			}
			else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET['action'] == 'removeComment'){
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				removeComment($_GET['id']);
			}
			else {
				throw new Exception('Aucun identifiant de commentaire envoyé');
			}
		}
		elseif ($_GET['action'] == 'addPost') {
			if (!empty($_POST['title']) && !empty($_POST['post'])) {
				addPost($_POST['title'], $_POST['post']);
			}
			else {
				throw new Exception('Tous les champs ne sont pas remplis !');
			}
		}
		elseif ($_GET['action'] == 'deletePost') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				deletePost($_GET['id']);
			}
			else {
				throw new Exception('Aucun identifiant de commentaire envoyé');
			}
		}
	}
	else {
		listPosts(1);
	}
}
catch(Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}