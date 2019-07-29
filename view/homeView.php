<?php
	session_start();
	if (!isset($_SESSION['id']) AND !isset($_SESSION['pseudo']))
	{
		if (isset($_COOKIE['pseudo']) && isset($_COOKIE['pass']))
			header('location: index.php?action=connection');
	}
?>

<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>
<div class="container">


	<?php
	while ($data = $posts->fetch())
	{
	?>

	<div class="jumbotron">
		<h2 id="lastPostPreview" class="text-center">Dernière publication</h2>
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