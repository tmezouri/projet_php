<?php $title = 'Commentaires récents'; ?>

<?php ob_start(); ?>

<div class="container">
	<div class="jumbotron">
		<h3 id="recentCommentTitle">Nombre de commentaires poster aujourd'hui : <?= $number['nbComments']?></h3>
		<?php
		while ($data = $comments->fetch())
		{
			?>
			<div id="recentComment" class="jumbotron">
				<p><?= htmlspecialchars($data['author'])?></p>
				<p id="commentDate"><?= $data['commentDate'] ?></p>
				<hr>
				<p><?= nl2br(htmlspecialchars($data['comment'])) ?></p>
				<a id="deleteRecentComment" class='btn btn-dark' data-toggle='modal' data-target='#Modal'><i class="fas fa-trash-alt"></i> Supprimer</a>
			</div>

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
							êtes vous sur de vouloir supprimer ce commentaire ?
						</div>
						<div class="modal-footer">
							<a class="btn btn-danger" href="index.php?action=deleteComment&amp;commentId=<?= $data['id'] ?>">Oui</a>
							<button type="button" class="btn btn-dark" data-dismiss="modal">Non</button>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		$comments->closeCursor();
		?>
	</div>
</div>

<?php
	$content = ob_get_clean();
	require('../view/template.php');
?>
