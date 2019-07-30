<?php $title = 'Gestion des publications'; ?>

<?php ob_start(); ?>

<div class="container">



<?php
while ($data = $posts->fetch())
{
?>
<div class="jumbotron">


	<h3><?= htmlspecialchars($data['title'])?></h3>
	<em>Poster le <?= $data['publicationDate'] ?></em>
	<p><?= substr($data['content'],0, strpos($data['content'],'</p>',0)) ?></div></p>
  <a class="btn btn-dark" href="index.php?action=editPost&amp;postId=<?= $data['id'] ?>"><i class="fas fa-pencil-alt"> modifier</i></a>
  <a class='btn btn-dark' data-toggle='modal' data-target='#Modal'><i class="fas fa-trash-alt delete"> supprimer</i></a>

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
          <a class="btn btn-danger" href="index.php?action=deletePost&amp;postId=<?= $data['id'] ?>">Oui</a>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Non</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
$posts->closeCursor();
?>

</div>


<?php
	$content = ob_get_clean();
	require('../view/template.php');
?>
