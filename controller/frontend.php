<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MembersManager.php');

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
		throw new Exception('Impossible d\'ajouter le post !');
	else
		header('location: index.php');
}

function addComment($postId, $author, $comment)
{
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$affectedLines = $commentManager->postComment($postId, $author, $comment);

	if($affectedLines === false)
		throw new Exception('Impossible d\'ajouter le commentaire !');
	else
		header('location: index.php?action=post&postId=' . $postId);
}

function textEditor()
{
		require('view/textEditorView.php');
}

function registration()
{
	$membersManager = new \JeanForteroche\Blog\Model\MembersManager();

	$submitOk = $membersManager->availableName($_POST['pseudo']);

	if($submitOk === true)
	{
		$hashed_pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$newMember = $membersManager->addMember($_POST['pseudo'], $hashed_pass, $_POST['email']);
		header('location: index.php?action=listPosts');
	}
	else
		throw new Exception('Ce nom d\'utilisateur est déjà pris');
}
