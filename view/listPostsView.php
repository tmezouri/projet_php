<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>
<div class="container">
	<h2>Dernières publications :</h2>

	<?php
		if (isset($_SESSION['rights']) AND $_SESSION['rights'] === "admin")
		{
	?>
			<a id="addPostButton" class='nav-link btn btn-dark col-md-4 col-sm-6' href='admin?action=textEditor'><i class="fas fa-plus"></i> Ajouter une nouvelle publication</a>
	<?php
		}
	?>

	<?php
	while ($data = $posts->fetch())
	{
	?>

	<div class="jumbotron">
		<a id="postLink" href="index.php?action=post&amp;postId=<?= $data['id'] ?>"><h3><?= htmlspecialchars($data['title'])?></h3></a>
		<em>Poster le <?= $data['publicationDate'] ?></em>
		<p><?= substr($data['content'],0, strpos($data['content'],'</p>',0)) ?></div></p>
		<a class="btn btn-dark" href="index.php?action=post&amp;postId=<?= $data['id'] ?>">Lire la suite</a>
	</div>

	<?php
	}
	$posts->closeCursor();
	?>
</div>




<?php
	$content = ob_get_clean();
	require('template.php');
?>
