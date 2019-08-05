<?php

namespace JeanForteroche\Blog\Model;

require_once('model/Manager.php');

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT *, DATE_FORMAT(creation_date, "%d/%m/%Y à %H:%i:%s") AS publicationDate FROM posts ORDER BY creation_date ASC');

		return $req;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %H:%i:%s") AS publicationDate FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function getLastPost()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %H:%i:%s") AS publicationDate FROM posts ORDER BY id DESC LIMIT 0, 1');

		return $req;
	}

	public function searchPost($search)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %H:%i:%s') AS publicationDate FROM posts WHERE title LIKE ? OR content LIKE ?");
		$req->execute(array("%" . $search . "%", "%" . $search . "%"));

		return $req;
	}
}
