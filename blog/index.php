<?php

require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/comment/addComment.php');
require_once('src/controllers/comment/updateComment.php');

use Application\Controllers\HomePage\HomePage;
use Application\Controllers\Post\Post;
use Application\Controllers\Comment\AddComment\AddComment;
use Application\Controllers\Comment\UpdateComment\UpdateComment;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new Post())->execute($identifier);
            } else {
                throw new Exception("ERREUR : Aucun idenifiant de billet envoyé");
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new AddComment())->execute($identifier, $_POST);
            } else {
                throw new Exception("ERREUR : Aucun identifiant de billet envoyé !");
            }
        } elseif ($_GET['action'] === 'updateComment') {
            if ((isset($GET['id']) && $_GET['id'] > 0)) {
                $identifier = $_GET['id'];

                $input = null;

                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $input = $_POST;
                }

                (new UpdateComment())->execute($identifier, $input);
            } else {
                throw new Exception(" ERREUR : Aucun identifiant de commentaire envoyé !");
            }
        } else {
            throw new Exception("Erreur 404 : la page que vous recherchez n'existe pas.");
        }
    } else {
        (new HomePage())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}

// https://github.com/OpenClassrooms-Student-Center/4670706-architecture-mvc-php/tree/main/blog

//In didn't done with the update of comments

// Blog to manage tickets and allow user to comment
