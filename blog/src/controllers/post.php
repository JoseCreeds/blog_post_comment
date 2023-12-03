<?php
namespace Application\Controllers\Post;

require_once('src/model/post.php');
require_once('src/model/comment.php');
require_once('src/lib/database.php');

use Application\Model\Post\PostRepository;
use Application\Model\Comment\CommentRepository;
use Application\lib\Database\DatabaseConnection;

class Post
{
    public function execute(string $identifier)
    {
        $connection = new DatabaseConnection();

        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $post = $postRepository->getPost($identifier);

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comments = $commentRepository->getComments($identifier);

        require('templates/post.php');
    }
}
