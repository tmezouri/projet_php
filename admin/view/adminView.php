<?php
	session_start();
?>

<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

<div class="container">
  <div class="list-group offset-3 col-6">
    <a href="index.php?action=textEditor" class="list-group-item list-group-item-action">Ajouter une nouvelle publication</a>
    <a href="index.php?action=postManagement" class="list-group-item list-group-item-action">Gestion des publications</a>
		<a href="index.php?action=recentComments" class="list-group-item list-group-item-action">Commentaires récent</a>
		<a href="index.php?action=reportedComments" class="list-group-item list-group-item-action">Commentaires signaler</a>
    <a href="#" class="list-group-item list-group-item-action">Donner ou retirer les droits d'administration</a>
  </div>
</div>



<?php
	$content = ob_get_clean();
	require('../view/template.php');
?>
