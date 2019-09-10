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
		<?php
		if(substr($data['content'], 0, 4) == '<div')
		{
			echo substr($data['content'], 0, strpos($data['content'],'</p>'));
			echo substr($data['content'], strpos($data['content'],'</p>'), 4);
			echo substr($data['content'], -6, 6);
		}
		else {
			echo $data['content'];
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
