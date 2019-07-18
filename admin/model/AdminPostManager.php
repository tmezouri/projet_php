<?php

namespace JeanForteroche\Blog\Model\Admin;

require_once('model/AdminManager.php');

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
		$post = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES ( ?, ?, NOW())');
		$newPost = $post->execute(array($title, $content));

		return $newPost;
	}

	public function modifyPost($postid, $title, $content)
	{
		$db = $this->dbConnect();
		$post = $db->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
		$affectedPost = $post->execute(array('id' => $postid, 'title' => $title, 'content' => $content));

		return $affectedPost;
	}

	public function deletePost($postid)
	{
		$db = $this->dbConnect();
		$post = $db->prepare('DELETE FROM posts WHERE id = :id');
		$affectedPost = $post->execute(array('id' => $postid));

		return $affectedPost;
	}
}
