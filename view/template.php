<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

		<title><?= $title ?></title>
	</head>

	<body>
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<a class="navbar-brand" href="#page-top">Jean Forteroche</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item rounded">
						<a class="nav-link" href="#accueil">Accueil</a>
					</li>
					<li class="nav-item rounded">
						<a class="nav-link" href="#publications">Publications</a>
					</li>
					<li class="nav-item rounded">
						<a class="nav-link" href="#contact">Contact</a>
					</li>
				</ul>
			</div>
		</nav>

		<?= $content ?>

	</body>
</html>
