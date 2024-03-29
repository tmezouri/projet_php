<?php

session_start();
if (!isset($_SESSION['id']) AND !isset($_SESSION['pseudo']))
{
	if (isset($_COOKIE['pseudo']) && isset($_COOKIE['pass']))
		header('location: index.php?action=connection');
}

require('controller/frontend.php');

try {
  if (isset($_GET['action']))
  {
		if ($_GET['action'] == 'home')
      home();

    elseif ($_GET['action'] == 'listPosts')
      listPosts();

		elseif ($_GET['action'] == 'contact')
      contact();

    elseif ($_GET['action'] == 'addPost')
    {
      if (!empty($_POST['title']) && !empty($_POST['content']))
        addPost($_POST['title'], $_POST['content']);
      else
        throw new Exception('Tous les champs ne sont pas remplis !');
    }

    elseif ($_GET['action'] == 'post')
		{
			if (isset($_GET['postId']) && $_GET['postId'] > 0)
				post();
			else
				throw new Exception('Aucun identifiant de billet envoyé');
		}

    elseif ($_GET['action'] == 'addComment')
		{
			if (isset($_GET['postId']) && $_GET['postId'] > 0)
			{
				if (!empty($_POST['author']) && !empty($_POST['comment']))
					addComment($_GET['postId'], $_POST['author'], $_POST['comment']);
				else
					throw new Exception('Tous les champs ne sont pas remplis !');
			}
			else
				throw new Exception('Aucun identifiant de billet envoyé');
		}

    elseif($_GET['action'] == 'registration')
    {
      if ($_POST['pass'] == $_POST['passConfirm'])
      {
          registration();
      }
      else
				header('Location: index.php?action=home&error=pass');
    }

    elseif($_GET['action'] == 'connection')
      connection();

    elseif ($_GET['action'] == 'logOut')
      logOut();

    elseif ($_GET['action'] == 'reportComment')
    {
      if (isset($_GET['commentId']) && $_GET['commentId'] > 0)
        reportComment();
      else
        throw new Exception('Aucun identifiant de billet envoyé');
    }

    elseif ($_GET['action'] == 'adminPage')
      adminPage();

		elseif ($_GET['action'] == 'search')
		{
			if (isset($_GET['search']) && !empty($_GET['search']))
				search($_GET['search']);
			elseif (isset($_POST['search']) && !empty($_POST['search']))
				search($_POST['search']);
			else
				throw new Exception('Le champs de recherche est vide');
		}

		elseif ($_GET['action'] == 'sendMail')
		{
			sendMail();
		}
  }
  else
    home();
}

catch(Exception $e)
{
	$errorMessage = $e->getMessage();
	require('view/errorView.php');
}
