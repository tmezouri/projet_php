<?php $title = 'Editeur de texte'; ?>

<?php ob_start(); ?>

<div class="container">

		<?php
			if ($_GET['action'] == 'editPost')
			{
		?>
			<form	action="index.php?action=modifyPost&amp;postId=<?= $_GET['postId'] ?>" method="post">
		<?php
			}
			else
			{
		?>
		<form	action="index.php?action=addPost" method="post">
		<?php
			}
		?>

		<div class="form-group">
			<label>Titre de la publication: </label>
			<input class="form-control" type="text" name="title"
			<?php if ($_GET['action'] == 'editPost')
				{
			?>
				value="<?= $post['title'];?>"
			<?php
				}
			?>>
		</div>
		<br>
		<textarea id="textEditor" name="content">
			<?php
			if ($_GET['action'] == 'editPost')
			{
				echo $post['content'];
			}
			else {
				echo "Contenu de la publication";
			}
			?>
		</textarea>
		<input id="submitTextEditor" class="btn btn-dark" type="submit" value="poster">
	</form>
</div>
<?php
	$content = ob_get_clean();
	require('../view/template.php');
?>
