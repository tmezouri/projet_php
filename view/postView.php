<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<h1>Mon blog !</h1>
<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>

<h3>
	<?= htmlspecialchars($post['title']) ?>
	<em>le <?= $post['publicationDate'] ?></em>
</h3>
<p>
	<?= htmlspecialchars($post['content']) ?>
</p>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;postId=<?= $post['id'] ?>" method="post">
	<label> auteur : <input type="text" name="author"></label>
	<label> commentaire : <input type="text" name="comment"></label>
	<input type="submit" value="poster">
</form>

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
