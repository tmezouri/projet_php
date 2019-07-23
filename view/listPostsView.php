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

<h2>Dernières publications :</h2>

<?php
while ($data = $posts->fetch())
{
?>
	<h3><?= htmlspecialchars($data['title'])?> le <?= $data['publicationDate'] ?></h3>
	<p><?= $data['content'] ?></p>
	<a href="index.php?action=post&amp;postId=<?= $data['id'] ?>">Commentaires</a>
<?php
}
$posts->closeCursor();
?>

<?php
	$content = ob_get_clean();
	require('template.php');
?>
