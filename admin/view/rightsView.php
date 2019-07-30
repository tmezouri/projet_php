<?php $title = 'Gestion des droits'; ?>

<?php ob_start(); ?>

<div class="container">
	<div class="jumbotron rights">
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



<?php
	$content = ob_get_clean();
	require('../view/template.php');
?>
