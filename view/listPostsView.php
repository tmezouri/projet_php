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
		<div class="test">
			<a id="postLink" href="index.php?action=post&amp;postId=<?= $data['id'] ?>"><h3 id="titlePost"><?= htmlspecialchars($data['title'])?></h3></a>
		</div>
		<em>Poster le <?= $data['publicationDate'] ?></em>
		<?php
		if(substr($data['content'], 0, 4) == '<div')
		{
			echo substr($data['content'], 0, strpos($data['content'],'</p>'));
			echo substr($data['content'], strpos($data['content'],'</p>'), 4);
			echo substr($data['content'], -6, 6);
		}
		else {
			echo $dataPosts['content'];
		}
		?>
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
