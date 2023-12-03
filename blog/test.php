<?php

class Comment
{
    public string $author;
    public string $french_creation_date;
    public string $comment;
}

$comment = new Comment();

$comment->author = 'Auteur';
$comment->french_creation_date = '23/03/2022 à 11h38min40s';
$comment->comment = 'Commentaire';

$comment->author = 'Nouvel auteur';

function test(Comment $comment)
{
    var_dump($comment);
}

test($comment);



// function getComments(string $post): array
// {
//     $database = commentDbConnect();
//     $statement = $database->prepare(
//         "SELECT id, author,comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
//     );
//     $statement->execute([$post]);

//     $comments = [];

//     while (($row = $statement->fetch())) {
//         $comment = new Comment();

//         $comment->author = $row['author'];
//         $comment->french_creation_date = $row['french_creation_date'];
//         $comment->comment = $row['comment'];


//         $comments[] = $comment;
//     }
//     return $comments;
// }


// function createComment($post, $author, $comment)
// {
//     $database = commentDbConnect();
//     $statement = $database->prepare("
//     INSERT INTO comments(post_id, author, comment, comment_date) VALUES (?, ?, ?, Now())
//     ");

//     $affectedLines = $statement->execute([$post, $author, $comment]);

//     return ($affectedLines > 0);
// }


// function commentDbConnect()
// {
//     // Connection to the database

//     $database = new PDO('mysql:host=localhost;dbname=blog_mvc_php;charset=utf8', 'root', '');

//     return $database;
// }

