<?php $title = "Le blog de l'AVBN"; ?>
<?php ob_start(); ?>

<h1>Le super blog de l'AVBN !</h1>
<p>Derniers billets du blog :</p>


<div class="news">
    <?php foreach ($posts as $post) :

    ?>
        <h3>
            <?php echo htmlspecialchars($post->title); ?>
            <em>le <?php echo $post->french_creation_date; ?></em>
        </h3>
        <p>
            <?php
            // we display the post content
            echo    nl2br(htmlspecialchars($post->content));
            ?>
            <br />
            <!-- <em><a href="post.php?id=?">Commentaires</a></em> -->
            <em><a href="index.php?action=post&&id=<?= urlencode($post->identifier) ?>">Commentaires</a></em>
        </p>
    <?php
    endforeach;
    ?>


</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php');  ?>

</html>