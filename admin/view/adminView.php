<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

<div class="container">
  <div class="list-group offset-2 col-8">
    <a href="index.php?action=textEditor" class="list-group-item list-group-item-action adminMenu">Ajouter une nouvelle publication</a>
    <a href="index.php?action=postManagement" class="list-group-item list-group-item-action adminMenu">Gestion des publications</a>
		<a href="index.php?action=recentComments" class="list-group-item list-group-item-action adminMenu">Commentaires récent</a>
		<a href="index.php?action=reportedComments" class="list-group-item list-group-item-action adminMenu">Commentaires signalé</a>
    <a href="index.php?action=rights" class="list-group-item list-group-item-action adminMenu">Donner ou retirer les droits d'administration</a>
  </div>
</div>



<?php
	$content = ob_get_clean();
	require('../view/template.php');
?>
