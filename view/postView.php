<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div id="container" class="container">

	<p><a class="btn btn-secondary" href="index.php?action=listPosts"><i class="fas fa-arrow-left"></i> Retour aux publications</a></p>

	<h2><?= $post['title'] ?></h2>
	<em>Poster le <?= $post['publicationDate'] ?></em>
	<p><?= $post['content'] ?></p>

	<div id="comments" class="jumbotron">
		<h4>Commentaires</h4>
		<?php
			if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
			{
		?>
			<form id="commentForm" action="index.php?action=addComment&amp;postId=<?= $post['id'] ?>" method="post">
				<input type="text" name="author" value="<?= $_SESSION['pseudo'];?>" hidden>
				<div class="form-group">
			    <textarea name="comment" class="form-control" rows="5"></textarea>
			  </div>
			  <button type="submit" class="btn btn-dark">Poster</button>
			</form>
		<?php
			}
		?>

		<?php
		while ($comment = $comments->fetch())
		{
		?>
		<div id="comment" class="jumbotron comment">
		    <p><?= htmlspecialchars($comment['author']) ?></p>
				<p id="commentDate"><?= $comment['commentDate'] ?></p>
				<hr>
		    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
				<?php
					if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
					{
				?>
				<a id="reportComment" class="btn btn-dark" href="index.php?action=reportComment&amp;commentId=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>"><i class="fas fa-exclamation"></i> Signaler</a>
				<?php
					}
				?>
		</div>
		<?php
		}
		?>

	</div>
</div>

<?php
	$content = ob_get_clean();
	require('template.php');
?>
