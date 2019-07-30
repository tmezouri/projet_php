<?php
	$title = 'Erreur';
	ob_start();
?>

<div class="container">
		<h2 class="alert alert-danger col-8 offset-2" role="alert">Erreur : <?= $errorMessage; ?></h2>
		<a class="btn btn-dark offset-2" href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Retour</a>
</div>





<?php
	$content = ob_get_clean();
	require('template.php');
?>
