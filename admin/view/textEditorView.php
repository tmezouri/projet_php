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
		<div id="textEditorButtons" class="row">
			<input id="submitTextEditor" class="btn btn-dark" type="submit" value="Poster">
			<?php if ($_GET['action'] == 'editPost') { ?>
				<a id="deleteTextEditor" class="btn btn-danger" data-toggle='modal' data-target='#Modal'><i class="fas fa-trash-alt"></i> Supprimer</a>
			<?php } ?>
		</div>
	</form>


	<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					êtes vous sur de vouloir supprimer cette publication ?
				</div>
				<div class="modal-footer">
					<a class="btn btn-danger" href="index.php?action=deletePost&amp;postId=<?= $_GET['postId'] ?>">Oui</a>
					<button type="button" class="btn btn-dark" data-dismiss="modal">Non</button>
				</div>
			</div>
		</div>
	</div>

</div>
<?php
	$content = ob_get_clean();
	require('../view/template.php');
?>
