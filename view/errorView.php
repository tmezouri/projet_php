<?php
	$title = 'Erreur';
	ob_start(); 
?>

<h2>Erreur : <?= $errorMessage; ?></h2>

<?php 
	$content = ob_get_clean(); 
	require('template.php');
?>