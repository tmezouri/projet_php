<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="public/css/style.css">
		<link rel="stylesheet" href="../public/css/style.css">
		<script type="text/javascript" src="../public/tinymce/tinymce.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://kit.fontawesome.com/aa9f9dbeb1.js"></script>
		<script type="text/javascript">
			tinyMCE.init({
				mode : "textareas",
				selector : '#textEditor',
  			language: 'fr_FR',
				entity_encoding : "raw"
			});
		</script>

		<title><?= $title ?></title>
	</head>

	<body>

		<?php
			include 'navbar.php';
		?>

		<?= $content ?>

	</body>
</html>
