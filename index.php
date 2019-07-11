<?php
require('controller/frontend.php');
if (isset($_GET['action']))
{
  if ($_GET['action'] == 'listPosts')
    listPosts();

  else if ($_GET['action'] == 'addPost') {
    if (!empty($_POST['title']) && !empty($_POST['content']))
      addPost($_POST['title'], $_POST['content']);
  }

  else if ($_GET['action'] == 'textEditor') {
    textEditor();
  }

  else if ($_GET['action'] == 'post') {
    if (isset($_GET['postId']) && $_GET['postId'] > 0)
    {
      post();
    }
  }

  elseif ($_GET['action'] == 'addComment') {
    if (isset($_GET['postId']) && $_GET['postId'] > 0)
    {
      if (!empty($_POST['author']) && !empty($_POST['comment']))
        addComment($_GET['postId'], $_POST['author'], $_POST['comment']);
    }
  }
}
else
  listPosts();
