<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

<div class="container">
  <div id="accordion" class="list-group col-12">

    <div class="card">
      <div class="card-header">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
          <h3>Gestion des publications</h3>
        </button>
      </div>

      <?php if (isset($_GET['active']) && $_GET['active'] == "management") { ?>
        <div id="collapseOne" class="collapse show">
      <?php
      }
      else { ?>
        <div id="collapseOne" class="collapse">
      <?php } ?>
        <div class="card-body">
          <a id="addPostButton" class='nav-link btn btn-dark col-md-4 col-sm-6' href='index.php?action=textEditor'><i class="fas fa-plus"></i> Ajouter une nouvelle publication</a>
          <?php
          while ($dataPosts = $posts->fetch())
          {
          ?>
          <div class="jumbotron">


          	<h3><?= htmlspecialchars($dataPosts['title'])?></h3>
          	<em>Poster le <?= $dataPosts['publicationDate'] ?></em>
          	<p><?= substr($dataPosts['content'],0, strpos($dataPosts['content'],'</p>',0)) ?></div></p>
            <a id="modify" class="btn btn-dark" href="index.php?action=editPost&amp;postId=<?= $dataPosts['id'] ?>"><i class="fas fa-pencil-alt"></i> Modifier</a>
            <a id="delete" class="btn btn-dark" data-toggle='modal' data-target='#Modal1'><i class="fas fa-trash-alt"></i> Supprimer</a>

            <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    êtes vous sur de vouloir supprimer cette publication ?
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-danger" href="index.php?action=deletePost&amp;postId=<?= $dataPosts['id'] ?>">Oui</a>
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
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <button class="btn btn-link" <?php if ($recentCommentsNumber['nbComments'] > 0) { echo "data-toggle='collapse'"; }?> data-target="#collapseTwo">
          <h3>Commentaires récent <span class="badge badge-primary"><?= $recentCommentsNumber['nbComments']?></span></h3>
        </button>
      </div>

      <div id="collapseTwo" class="collapse">
        <div class="card-body">
          <?php
          while ($dataRecentComments = $recentComments->fetch())
          {
            ?>
            <div id="recentComment" class="jumbotron">
              <p><?= htmlspecialchars($dataRecentComments['author'])?></p>
              <p id="commentDate"><?= $dataRecentComments['commentDate'] ?></p>
              <hr>
              <p><?= nl2br(htmlspecialchars($dataRecentComments['comment'])) ?></p>
              <a id="deleteRecentComment" class='btn btn-dark' data-toggle='modal' data-target='#Modal2'><i class="fas fa-trash-alt"></i> Supprimer</a>
            </div>

            <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    êtes vous sur de vouloir supprimer ce commentaire ?
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-danger" href="index.php?action=deleteComment&amp;commentId=<?= $dataRecentComments['id'] ?>">Oui</a>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Non</button>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
          $recentComments->closeCursor();
          ?>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <button class="btn btn-link" <?php if ($reportedCommentsNumber['nbComments'] > 0) { echo "data-toggle='collapse'"; }?> data-target="#collapseThree">
          <h3>Commentaires signalé  <span class="badge badge-primary"><?= $reportedCommentsNumber['nbComments']?></span></h3>
        </button>
      </div>

      <div id="collapseThree" class="collapse">
        <div class="card-body">
      		<?php
      		while ($dataReportedComments = $reportedComments->fetch())
      		{
      			?>
      			<div id="reportedComment" class="jumbotron">
      				<p><?= htmlspecialchars($dataReportedComments['author'])?></p>
      				<p id="commentDate"><?= $dataReportedComments['commentDate'] ?></p>
      				<hr>
      				<p><?= nl2br(htmlspecialchars($dataReportedComments['comment'])) ?></p>
      				<a id="deleteReport" class='btn btn-dark' data-toggle='modal' data-target='#Modal3'><i class="fas fa-trash-alt"></i> Supprimer</a>
      			</div>

      			<div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-hidden="true">
      				<div class="modal-dialog" role="document">
      					<div class="modal-content">
      						<div class="modal-header">
      							<h5 class="modal-title">Suppression</h5>
      							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      								<span aria-hidden="true">&times;</span>
      							</button>
      						</div>
      						<div class="modal-body">
      							êtes vous sur de vouloir supprimer ce commentaire ?
      						</div>
      						<div class="modal-footer">
      							<a class="btn btn-danger" href="index.php?action=deleteComment&amp;commentId=<?= $dataReportedComments['id'] ?>">Oui</a>
      							<button type="button" class="btn btn-dark" data-dismiss="modal">Non</button>
      						</div>
      					</div>
      				</div>
      			</div>
      			<?php
      		}
      		$reportedComments->closeCursor();
      		?>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour">
          <h3>Donner ou retirer les droits d'administration</h3>
        </button>
      </div>
      <?php if (isset($_GET['active']) && $_GET['active'] == "rights") { ?>
        <div id="collapseFour" class="collapse show">
      <?php
      }
      else { ?>
        <div id="collapseFour" class="collapse">
      <?php } ?>
        <div class="card-body">
          <form action="index.php?action=changeRights" method="post">
            <div class="form-group row">
              <div class="col-6 offset-3">
                <label class="col-form-label">Nom d'utilisateur :</label>
                <input type="text" class="form-control" name="pseudo" required>
              </div>
            </div>

            <fieldset class="form-group row">
              <div class="col-6 offset-3">
                <label class="col-form-label">Action :</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rights" value="admin" checked>
                  <label class="form-check-label">Donner les droits d'administrateur</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="rights" value="none">
                  <label class="form-check-label">Retirer les droits d'administrateur</label>
                </div>
              </div>
            </fieldset>

            <div class="form-group row">
              <div class="col-2 offset-3">
                <button type="submit" class="btn btn-dark">Valider</button>
              </div>
            </div>
          </form>
          <?php
          if(isset($_GET['change']))
            echo "<div class=\"alert alert-success col-6 offset-3\" role=\"alert\">Changement valider</div>";
          ?>
        </div>
      </div>
    </div>

  </div>
</div>


<?php
	$content = ob_get_clean();
	require('../view/template.php');
?>
