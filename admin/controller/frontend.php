<?php

require_once('model/AdminPostManager.php');
require_once('model/AdminCommentManager.php');
require_once('model/AdminMembersManager.php');

function home()
{
	header('location: ../index.php');
}

function listPosts()
{
	header('location: ../index.php?action=listPosts');
}

function contact()
{
	header('location: ../index.php?action=contact');
}

function adminPage()
{
	$postManager = new \JeanForteroche\Blog\Model\Admin\PostManager();
	$commentManager = new \JeanForteroche\Blog\Model\Admin\CommentManager();
	$reportedComments = $commentManager->reportedComments();
	$reportedCommentsNumber = $commentManager->getReportedCommentsNumber();
	$recentComments = $commentManager->getRecentComments();
	$recentCommentsNumber = $commentManager->getRecentCommentsNumber();
	$posts = $postManager->getPosts();

	require('view/adminView.php');
}

function textEditor()
{
		require('view/textEditorView.php');
}

function addPost($title, $content)
{
	$postManager = new \JeanForteroche\Blog\Model\Admin\PostManager();

	$post = $postManager->addPost($title, $content);

	if($post === false)
		throw new Exception('Impossible d\'ajouter le post !');
	else
		header('location: ../index.php?action=listPosts');
}

function editPost()
{
	$postManager = new \JeanForteroche\Blog\Model\Admin\PostManager();
	$post = $postManager->getPost($_GET['postId']);

	require('view/textEditorView.php');
}

function modifyPost($postid, $title, $content)
{
	$postManager = new \JeanForteroche\Blog\Model\Admin\PostManager();
	$affectedPost = $postManager->modifyPost($postid, $title, $content);
	if($affectedPost === false)
		throw new Exception('Impossible de modifier la publication !');
	else
		header('location: ../index.php?action=post&postId=' . $postid);
}

function deletePost($postId)
{
	$postManager = new \JeanForteroche\Blog\Model\Admin\PostManager();
	$affectedPost = $postManager->deletePost($postId);

	if($affectedPost === false)
		throw new Exception('Impossible de supprimer la publication !');
	else
		header('location: index.php?action=adminPage&active=management');
}

function deleteComment($commentId)
{
	$commentManager = new \JeanForteroche\Blog\Model\Admin\CommentManager();
	$affectedComment = $commentManager->deleteComment($commentId);

	if($affectedComment === false)
		throw new Exception('Impossible de supprimer le commentaire !');
	else
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
}

function changeRights($pseudo, $rights, $sessionPseudo)
{
		$membersManager = new \JeanForteroche\Blog\Model\Admin\MembersManager();
		$member = $membersManager->checkRights($pseudo);

		if ($member === false)
			throw new Exception('Utilisateur inconnu !');
		elseif ($sessionPseudo == $pseudo)
			throw new Exception('Vous ne pouvez pas changer vos propre droits');
		elseif ($member['rights'] === $rights)
			throw new Exception('Cet utilisateur a déjà ce type de droits');
		else
		{
			$member = $membersManager->changeRights($pseudo, $rights);

			if ($member === false)
				throw new Exception('Impossible de changer les droits d\'administrateur');
			else
				header('location: index.php?active=rights&change=success');
		}
}

function logOut()
{
	session_start();

	$_SESSION = array();
	session_destroy();

	setcookie('pseudo', '');
	setcookie('pass', '');

	header('location: ../index.php');
}

function search()
{
	header('location: ../index.php?action=search&search=' . $_POST['search']);
}
