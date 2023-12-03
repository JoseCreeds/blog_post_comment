<?php

namespace Application\Controllers\Comment\UpdateComment;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use Application\Model\Comment\CommentRepository;
use Application\lib\Database\DatabaseConnection;

class UpdateComment
{
    public function execute(string $identifier, ?array $input)
    {
        if ($input !== null) {
            $author = null;
            $comment = null;
            if (!empty($input['author']) && !empty($input['comment'])) {
                $author = $input['author'];
                $comment = $input['comment'];
            } else {
                throw new \Exception("Les données du formulaire sont invalides. Commentaire non modifié!");
            }


            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();

            $success = $commentRepository->updateComment($identifier, $author, $comment);

            if (!$success) {
                throw new \Exception("Impossible de modifier le commentaire");
            } else {
                header('Location: index.php?action=updateComment&&id=' . $identifier);
            }
        }

        // Otherwise, it displays the form.
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getComment($identifier);
        if ($comment === null) {
            throw new \Exception("Le commentaire $identifier n'existe pas.");
        }
        
        require('templates/updateComment.php');
    }
}
