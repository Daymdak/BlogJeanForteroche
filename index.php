<?php
require('controller/frontend.php');
require('controller/backend.php');

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listPosts') {
			listPosts();
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
		elseif ($_GET['action'] == 'controlPanel') {
			controlPanel();
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
	}
	else {
		listPosts();
	}
}
catch(Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}