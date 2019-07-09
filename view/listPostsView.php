<?php $title = 'Mon blog'; ?>


<?php ob_start(); ?>

<a href="index.php?action=textEditor">Editeur de texte</a>
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
