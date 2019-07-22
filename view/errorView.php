<?php
	session_start();
?>

<?php
	$title = 'Erreur';
	ob_start();
?>

<h2>Erreur : <?= $errorMessage; ?></h2>

<a href="javascript:history.back()">Retour</a>

<?php
	$content = ob_get_clean();
	require('template.php');
?>
