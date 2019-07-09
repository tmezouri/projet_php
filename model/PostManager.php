<?php

namespace JeanForteroche\Blog\Model;

require_once('model/Manager.php');

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT *, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS publicationDate FROM posts');

		return $req;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS publicationDate FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function addPost($title, $content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES ( ?, ?, NOW())');
		$post = $req->execute(array($title, $content));

		return $postId;
	}
}
