<?php

namespace JeanForteroche\Blog\Model;

require_once('model/Manager.php');

class CommentManager extends Manager
{
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %H:%i:%s") AS commentDate FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;
	}

	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES ( ?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author, $comment));

		return $affectedLines;
	}

	public function reportComment($id)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('UPDATE comments SET report = report + 1 WHERE id = :id');
		$affectedComment = $comments->execute(array('id' => $id));

		return $affectedComment;
	}
}
