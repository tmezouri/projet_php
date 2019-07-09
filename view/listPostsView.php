<?php $title = 'Mon blog'; ?>


<?php ob_start(); ?>

<form  action="index.php?action=addPost" method="post">
	<label>Titre : </label>
	<input type="text" name="title">
	<label>Texte : </label>
	<input type="text" name="content">
	<input type="submit" value="poster">
</form>

<p>Derniers billets du blog :</p>

<?php
while ($data = $posts->fetch())
{
?>
	<h3><?= htmlspecialchars($data['title'])?> <em>le <?= $data['publicationDate'] ?></em></h3>
	<p><?= htmlspecialchars($data['content']) ?></p>
	<a href="index.php?action=post&amp;postId=<?= $data['id'] ?>">Commentaires</a>
<?php
}
$posts->closeCursor();
?>

<?php
	$content = ob_get_clean();
	require('template.php');
?>
