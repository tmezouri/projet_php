<?php

require_once('model/AdminPostManager.php');
require_once('model/AdminCommentManager.php');
require_once('model/AdminMembersManager.php');

function listPosts()
{
	header('location: ../index.php?action=listPosts');
}

function admin()
{
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
		header('location: index.php');
}

function postManagement()
{
	$postManager = new \JeanForteroche\Blog\Model\Admin\PostManager();
	$posts = $postManager->getPosts();

	require('view/postManagementView.php');
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
		header('location: ../index.php?action=listPosts');
}

function reportedComments()
{
	$commentManager = new \JeanForteroche\Blog\Model\Admin\CommentManager();

	$reportedComments = $commentManager->reportedComments();

	if($reportedComments === false)
		throw new Exception('Aucun commentaires n\'a été signalé');
	else
		require('view/reportView.php');
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

function recentComments()
{
	$commentManager = new \JeanForteroche\Blog\Model\Admin\CommentManager();
	$comments = $commentManager->getRecentComments();

	if($comments === false)
		header('location: index.php?action=reportedComments');
	else
		require('view/recentCommentsView.php');
}

function rights()
{
		require('view/rightsView.php');
}

function changeRights($pseudo, $rights)
{
		$membersManager = new \JeanForteroche\Blog\Model\Admin\MembersManager();
		$affectedMember = $membersManager->checkRights($pseudo);

		if ($affectedMember === false)
			throw new Exception('Utilisateur inconnu !');
		elseif ($affectedMember['rights'] === $rights)
			throw new Exception('Cet utilisateur a déjà ce type de droits');
		else
		{
			$affectedMember = $membersManager->changeRights($pseudo, $rights);

			if ($affectedMember === false)
				throw new Exception('Impossible de changer les droits d\'administrateur');
			else
				header('location: index.php?action=rights&change=success');
		}

}
