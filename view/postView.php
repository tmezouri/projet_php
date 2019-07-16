<?php
	session_start();
?>

<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>

<h3>
	<?= htmlspecialchars($post['title']) ?>
	<em>le <?= $post['publicationDate'] ?></em>
</h3>
<p>
	<?= htmlspecialchars($post['content']) ?>
</p>

<h2>Commentaires</h2>

<?php
	if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
	{
?>
		<form action="index.php?action=addComment&amp;postId=<?= $post['id'] ?>" method="post">
			<input type="text" name="author" value="<?= $_SESSION['pseudo'];?>" hidden>
			<label> commentaire : <input type="text" name="comment"></label>
			<input type="submit" value="poster">
		</form>
<?php
	}
?>

<?php

while ($comment = $comments->fetch())
{
?>
    <p><?= htmlspecialchars($comment['author']) ?> le <?= $comment['commentDate'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}

?>

<?php
	$content = ob_get_clean();
	require('template.php');
?>
