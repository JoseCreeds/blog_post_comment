<?php
namespace Application\Model\Post;

// connexion à la base de donnée
require_once('src/lib/database.php');


use Application\lib\Database\DatabaseConnection;


class Post
{
    public string $title;
    public string $french_creation_date;
    public string $content;
    public string $identifier;
}

class PostRepository
{
    public DatabaseConnection $connection;

    function getPost(string $identifier): Post
    {

        //We retrive post by they ID
        $statement = $this->connection->getConnection()->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?");
        $statement->execute([$identifier]);

        $row = $statement->fetch();

        $post = new Post();
        $post->title = $row['title'];
        $post->content = $row['content'];
        $post->french_creation_date = $row['french_creation_date'];
        $post->identifier = $row['id'];


        return $post;
    }

    function getPosts(): array
    {
        // We retrive the 5 last blog posts
        $statement = $this->connection->getConnection()->query("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5");

        $posts = [];

        while ($row = $statement->fetch()) {
            $post = new Post();
            $post->title = $row['title'];
            $post->french_creation_date = $row['french_creation_date'];
            $post->content = $row['content'];
            $post->identifier = $row['id'];

            $posts[] = $post;
        }
        return $posts;
    }
}
