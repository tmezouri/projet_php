<?php
	$title = 'Contact';
	ob_start();
?>

<div class="container jumbotron">
		<h2>Contact</h2>
		<hr>
		<form action="index.php?action=sendMail" method="post">
		  <div class="form-group">
		    <label>Votre Adresse Mail</label>
				<?php if (isset($_SESSION['email'])): ?>
					<input type="email" name="mail" class="form-control" value="<?= $_SESSION['email'] ?>" required>
				<?php else: ?>
					<input type="email" name="mail" class="form-control" required>
				<?php endif; ?>
		  </div>
			<div class="form-group">
		    <label>Sujet Du Message</label>
		    <input type="text" name="subject" class="form-control" required>
		  </div>

		  <div class="form-group">
		    <label>Message</label>
		    <textarea name="message" class="form-control" rows="5" required></textarea>
		  </div>
			<button type="submit" class="btn btn-dark">Envoyer</button>
		</form>

		<?php if (isset($_GET['success']) && ($_GET['success'] == "true")): ?>
			<div class="alert alert-success alertContact" role="alert">Mail envoyé</div>
		<?php elseif (isset($_GET['success']) && ($_GET['success'] == "false")): ?>
			<div class="alert alert-danger alertContact" role="alert">Échec de l'envoi</div>
		<?php endif; ?>
</div>



<?php
	$content = ob_get_clean();
	require('template.php');
?>
