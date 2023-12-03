<?php $title = "Le blog de l'AVBN"; ?>
<?php ob_start(); ?>


<h1>Le super blog de l'AVBN !</h1>
<p><a href="index.php">Retour à la liste des billets :</a></p>


<div class="news">
    <h3>
        <?php echo htmlspecialchars($post->title); ?>
        <em>le <?php echo $post->french_creation_date; ?></em>
    </h3>
    <p>
        <?php
        // we display the post content
        echo nl2br(htmlspecialchars($post->content));
        ?>
        <br />
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&id=<?= urldecode($post->identifier) ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" name="author" id="author">
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    </div><br />
    <div>
        <input type="submit" value="Poster">
    </div>
</form>

<?php foreach ($comments as $comment) { ?>


    <p></strong><?php echo htmlspecialchars($comment->author); ?></strong> le <?= $comment->french_creation_date; ?>(<a href="index.php?action=updateComment&&id=<?= urldecode($comment->identifier) ?>">modifier</a>)</p>
    <p><?php echo nl2br(htmlspecialchars($comment->comment)); ?></p><br />

<?php } ?>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>