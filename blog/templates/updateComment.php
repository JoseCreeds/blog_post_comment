<?php $title = "Modifier commentaire"; ?>

<?php ob_start(); ?>

<h1>Le super blog de l'AVBN !</h1>
<p><a href="index.php?action=post&id=<?= $comment->post ?>">Retour à la liste des billets :</a></p>

<h2>Modifier commentaire ommentaires</h2>

<form action="index.php?action=updateComment&id=<?= $comment->identifier ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" name="author" id="author" value="<?= htmlspecialchars($comment->author) ?>">
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea name="comment" id="comment" cols="30" rows="10" value="<?= htmlspecialchars($comment->comment) ?>"></textarea>
    </div><br />
    <div>
        <input type="submit" value="Poster">
    </div>
</form>

<?php $content = ob_get_clean() ?>

<?php require('layout.php'); ?>