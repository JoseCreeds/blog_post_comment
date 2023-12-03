<?php
namespace Application\Controllers\HomePage;

require_once('src/model/post.php');
require_once('src/lib/database.php');

use Application\Model\Post\PostRepository;
use Application\lib\Database\DatabaseConnection;

class homePage
{
    public function execute()
    {
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $posts = $postRepository->getPosts();

        require('templates/homepage.php');
    }
}
