<?php $title = 'Editeur de texte'; ?>


<?php ob_start(); ?>

<div class="container">
	<form action="index.php?action=addPost" method="post">
		<div class="form-group">
			<label>Titre de la publication: </label>
			<input class="form-control" type="text" name="title">
		</div>
		<br>
		<textarea id="textEditor" name="content">Contenu de la publication</textarea>
		<input class="btn btn-dark" type="submit" value="poster">
	</form>
</div>
<?php
	$content = ob_get_clean();
	require('template.php');
?>
