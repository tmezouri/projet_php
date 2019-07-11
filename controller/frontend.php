<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();
  $posts = $postManager->getPosts();

  require('view/listPostsView.php');
}

function post()
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$post = $postManager->getPost($_GET['postId']);
	$comments = $commentManager->getComments($_GET['postId']);

	require('view/postView.php');
}

function addPost($title, $content)
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();

	$post = $postManager->addPost($title, $content);

	if($post === false)
		echo "<p>Impossible d\'ajouter le post !</p>";
	else
		header('location: index.php');
}

function addComment($postId, $author, $comment)
{
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$affectedLines = $commentManager->postComment($postId, $author, $comment);

		header('location: index.php?action=post&postId=' . $postId);
}

function textEditor()
{
		require('view/textEditorView.php');
}
