<?php

require_once('model/PostManager.php');

function listPosts()
{
	$postManager = new \JeanForteroche\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/listPostsView.php');
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

function textEditor()
{
		require('view/textEditorView.php');
}
