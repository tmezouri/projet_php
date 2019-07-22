<?php
	session_start();
?>

<?php $title = 'Administration'; ?>

<?php ob_start(); ?>


<div class="container">
	<form action="index.php?action=changeRights" method="post">
	  <div class="form-group row">
	    <label class="col-2 offset-3 col-form-label">Nom d'utilisateur :</label>
	    <div class="col-4">
	      <input type="text" class="form-control" name="pseudo" required>
	    </div>
	  </div>

	  <fieldset class="form-group">
	    <div class="row">
	      <legend class="col-form-label col-2 offset-3 pt-0">Action :</legend>
	      <div class="col-4">

	        <div class="form-check">
	          <input class="form-check-input" type="radio" name="rights" value="admin" checked>
	          <label class="form-check-label">
	            Donner les droits d'administrateur
	          </label>
	        </div>

	        <div class="form-check">
	          <input class="form-check-input" type="radio" name="rights" value="none">
	          <label class="form-check-label">
	            Retirer les droits d'administrateur
	          </label>
	        </div>

	      </div>
	    </div>
	  </fieldset>

	  <div class="form-group row">
	    <div class="col-2 offset-3">
	      <button type="submit" class="btn btn-primary">Valider</button>
	    </div>
	  </div>
	</form>
	<?php
	if(isset($_GET['change']))
		echo "<p class=\"col-2 offset-3\">Changement valider</p>";
	?>

</div>



<?php
	$content = ob_get_clean();
	require('../view/template.php');
?>
