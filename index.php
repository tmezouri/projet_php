<?php
require('controller/frontend.php');
if (isset($_GET['action']))
{
  if ($_GET['action'] == 'addPost') {
    if (!empty($_POST['title']) && !empty($_POST['content']))
      addPost($_POST['title'], $_POST['content']);
  }
}
else
  listPosts();
