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

function adminPage()
{
	header('location: admin');
}

function post()
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$post = $postManager->getPost($_GET['postId']);
	$comments = $commentManager->getComments($_GET['postId']);

	require('view/postView.php');
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

function connection()
{
	$membersManager = new \JeanForteroche\Blog\Model\MembersManager();

	if (isset($_COOKIE['pseudo']) && isset($_COOKIE['pass']))
	{
		$result = $membersManager->connection($_COOKIE['pseudo']);

		$isPasswordCorrect = password_verify($_COOKIE['pass'], $result['pass']);

		if (!$result)
			throw new Exception('Mauvais identifiant ou mot de passe !');
		else
		{
			if ($isPasswordCorrect) {
					session_start();
					$_SESSION['id'] = $result['id'];
					$_SESSION['pseudo'] = $result['pseudo'];
					$_SESSION['rights'] = $result['rights'];
					header('location: index.php?action=listPosts');
			}
			else {
				throw new Exception('Mauvais identifiant ou mot de passe !');
			}
		}
	}

	else {
		$result = $membersManager->connection($_POST['pseudo']);

		$isPasswordCorrect = password_verify($_POST['pass'], $result['pass']);

		if (!$result)
			throw new Exception('Mauvais identifiant ou mot de passe !');
		else
		{
			if ($isPasswordCorrect) {
					session_start();
					$_SESSION['id'] = $result['id'];
					$_SESSION['pseudo'] = $result['pseudo'];
					$_SESSION['rights'] = $result['rights'];
					if ($_POST['auto'])
					{
						setcookie('pseudo', $result['pseudo'], time() + 365*24*3600);
						setcookie('pass', $_POST['pass'], time() + 365*24*3600);
					}
					header('location: index.php?action=listPosts');
			}
			else {
				throw new Exception('Mauvais identifiant ou mot de passe !');
			}
		}
	}
}

function logOut()
{
	session_start();

	$_SESSION = array();
	session_destroy();

	setcookie('pseudo', '');
	setcookie('pass', '');

	header('location: index.php?action=listPosts');
}

function reportComment()
{
	$commentManager = new \JeanForteroche\Blog\Model\CommentManager();

	$affectedComment = $commentManager->reportComment($_GET['commentId']);

	if (!$affectedComment)
		throw new Exception('Mauvais identifiant de billet envoyé !');
	else {
		$postId = $_GET['postId'];
		header("location: index.php?action=post&postId=$postId");
	}
}
