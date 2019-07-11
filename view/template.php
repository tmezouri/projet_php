<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="public/css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
		<script>tinymce.init({selector:'#textEditor'});</script>

		<title><?= $title ?></title>
	</head>

	<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#page-top">Jean Forteroche</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item rounded">
						<a class="nav-link" href="index.php">Accueil</a>
					</li>
					<li class="nav-item rounded">
						<a class="nav-link" href="index.php?action=listPosts">Publications</a>
					</li>
					<li class="nav-item rounded">
						<a class="nav-link" href="#contact">Contact</a>
					</li>
					<li class="nav-item rounded">
						<a type="button" class="nav-link" data-toggle="modal" data-target="#myModal">Connexion</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">

				<div class="modal-header">
				<h4 class="modal-title">Connexion</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<form action="">

						<div class="form-group">

							<label for="email">Adresse Mail :</label>
							<input type="email" class="form-control" id="email">
						</div>

						<div class="form-group">
							<label for="pwd">Mot de Passe :</label>
							<input type="password" class="form-control" id="pwd">
						</div>

						<div class="form-group form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox"> Se souvenir de moi
							</label>
						</div>

						<button type="submit" class="btn btn-dark">Connexion</button>
						<hr>
					</form>
				</div>

				<div class="modal-header">
					<h4 class="modal-title">Inscription</h4>
				</div>

				<div class="modal-body">
						<form action="index.php?action=registration" method="post">

							<div class="form-group">
								<label>Nom d'utilisateur :</label>
								<input type="text" class="form-control" name="pseudo" maxlength="50" required>
							</div>

							<div class="form-group">
								<label>Adresse mail :</label>
								<input type="email" class="form-control" name="email" required>
							</div>

							<div class="form-group">
								<label>Mot de passe :</label>
								<input type="password" class="form-control" name="pass" maxlength="32" required>
							</div>

							<div class="form-group">
								<label>Confirmation du mot de passe :</label>
								<input type="password" class="form-control" name="passConfirm" maxlength="32" required>
							</div>

							<button type="submit" class="btn btn-dark">Inscription</button>

						</form>
					</div>
				</div>
			</div>
		</div>

		<?= $content ?>

	</body>
</html>
