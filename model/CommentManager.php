<?php
namespace JeanForteroche\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;
	}

	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$newComment = $comments->execute(array($postId, $author, $comment));

		return $newComment;
	}

	public function addReportComment($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT reports FROM comments WHERE id = ?');
		$req->execute(array($id));
		$data = $req->fetch();
		$numberReports = $data['reports'] + 1;
		$req->closeCursor();

		$req = $db->prepare('UPDATE comments SET reports = :newreports WHERE id = :id');
		$req->execute(array(
			'newreports' => $numberReports,
			'id' => $id
		));
	}
}