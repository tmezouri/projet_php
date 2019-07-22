<?php
	session_start();
?>

<?php
	$title = 'Erreur';
	ob_start();
?>

<h2>Erreur : <?= $errorMessage; ?></h2>

<a href="<?= header('Location: ' . $_SERVER['HTTP_REFERER'] ); ?>">retour</a>

<?php
	$content = ob_get_clean();
	require('../view/template.php');
?>
