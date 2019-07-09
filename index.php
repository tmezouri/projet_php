<?php $title = 'Jean Forteroche'; ?>


<?php ob_start(); ?>




<?php
	$content = ob_get_clean();
	require('view/template.php');
?>
