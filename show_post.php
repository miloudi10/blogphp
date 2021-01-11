<?php

// Affichage

include "app/connect.php";
$id= $_GET['id'];
$sql1="SELECT post.Id,`Title`,(`Contents`)  , DATE(`CreationTimestamp`) AS DATE, category.Name,author.FirstName,author.LastName 
FROM `post` 
INNER JOIN category 
ON post.Category_Id = category.Id 
INNER JOIN author 
ON post.Author_Id = author.Id 
WHERE Post.Id=?"
;
    $reponse = $pdo->prepare($sql1);
    $reponse->execute([$_GET['id']]);
    $post = $reponse->fetch();

$sql= "SELECT * FROM `comment` WHERE `Post_Id`=?";  
$reponse = $pdo->prepare($sql);
$reponse->execute([$_GET['id']]);
$comments = $reponse->fetchAll();  




$title =$post['Title'];
$template = 'show_post';

include 'layout.phtml';
