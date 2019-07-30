<?php

namespace JeanForteroche\Blog\Model\Admin;

require_once('model/AdminManager.php');

class CommentManager extends Manager
{
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %H:%i:%s") AS commentDate FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;
	}

	public function reportedComments()
	{
			$db = $this->dbConnect();
			$comments = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %H:%i:%s") AS commentDate FROM comments WHERE report > 0 ORDER BY comment_date DESC');

			return $comments;
	}

	public function deleteComment($commentId)
	{
			$db = $this->dbConnect();
			$comment = $db->prepare('DELETE FROM comments WHERE id = :id');
			$comment->execute(array('id' => $commentId));

			return $comment;
	}

	public function getRecentComments()
	{
		$db = $this->dbConnect();
		$comments = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %H:%i:%s") AS commentDate FROM comments WHERE DATE(comment_date) = DATE(NOW()) ORDER BY comment_date DESC');

		return $comments;
	}

	public function getRecentCommentsNumber()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT COUNT(*) as nbComments FROM comments WHERE DATE(comment_date) = DATE(NOW())');
		$comments = $req->fetch();

		return $comments;
	}

	public function getReportedCommentsNumber()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT COUNT(*) as nbComments FROM comments WHERE report > 0');
		$comments = $req->fetch();

		return $comments;
	}
}
