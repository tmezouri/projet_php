<?php
require('controller/frontend.php');

try {
  if (isset($_GET['action']))
  {
    if ($_GET['action'] == 'listPosts')
      listPosts();

    elseif ($_GET['action'] == 'textEditor') {
      textEditor();
    }

    elseif ($_GET['action'] == 'addPost')
    {
      if (!empty($_POST['title']) && !empty($_POST['content']))
        addPost($_POST['title'], $_POST['content']);
      else
        throw new Exception('Tous les champs ne sont pas remplis !');
    }

    elseif ($_GET['action'] == 'postManagement')
    {
      postManagement();
    }

    elseif ($_GET['action'] == 'editPost')
    {
      if (isset($_GET['postId']) && $_GET['postId'] > 0)
        editPost();
      else
        throw new Exception('Aucun identifiant de billet envoyé');
    }

    elseif ($_GET['action'] == 'modifyPost')
    {
      if (isset($_GET['postId']) && $_GET['postId'] > 0)
        modifyPost($_GET['postId'], $_POST['title'], $_POST['content']);
      else
        throw new Exception('Aucun identifiant de billet envoyé');
    }

    elseif ($_GET['action'] == 'deletePost')
    {
      if (isset($_GET['postId']) && $_GET['postId'] > 0)
        deletePost($_GET['postId']);
      else
        throw new Exception('Aucun identifiant de billet envoyé');
    }

    elseif ($_GET['action'] == 'reportedComments')
    {
      reportedComments();
    }

    elseif ($_GET['action'] == 'deleteComment')
    {
      if (isset($_GET['commentId']) && $_GET['commentId'] > 0)
        deleteComment($_GET['commentId']);
      else
        throw new Exception('Aucun identifiant de commentaire envoyé');
    }
  }
  else
    admin();
}

catch(Exception $e)
{
	$errorMessage = $e->getMessage();
	require('view/errorView.php');
}
