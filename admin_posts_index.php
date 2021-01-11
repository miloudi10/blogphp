<?php
include 'app/connect.php';



    // Récupération de tous les articles du blog classés par ordre antéchronologique.
    $sql =
    
        "SELECT
            Post.Id,
            Title,
            Contents,
            CreationTimestamp,
            FirstName,
            LastName,
            Category.Name AS Category_Name
        FROM
            Post
        INNER JOIN
            Author
        ON
            Post.Author_Id = Author.Id
        INNER JOIN
            Category
        ON
            Post.Category_Id = Category.Id
        ORDER BY
            CreationTimestamp DESC
    ";
    $result = $pdo->query($sql);
    $posts = $result->fetchAll();
    
  
    


$title = 'Administration du blog';
$template = 'admin_posts_index';
include 'layout.phtml';
