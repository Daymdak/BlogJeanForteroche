<?php
namespace JeanForteroche\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
	public function getAllPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');

		return $req;
	}

	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

		return $req;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\' ) AS creation_date_fr FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function newPost($title, $post)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES (?, ?, NOW())');
		$req->execute(array($title, $post));

		return $req;
	}

	public function changePost($id, $title, $post)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE posts SET title = :title, content = :post WHERE id = :id');
		$req->execute(array(
			'title' => $title,
			'post' => $post,
			'id' => $id
		));
	}

	public function removePost($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM posts WHERE id= ?');
		$req->execute(array($id));

		return $req;
	}
}