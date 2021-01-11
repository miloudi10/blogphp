<?php

include 'app/connect.php';


$title = 'Créer un article';
$template = 'admin_posts_new';
 

$sql =
" SELECT
        Id,
        FirstName,
        LastName
    FROM
        Author
";
$result = $pdo->query($sql);
$authors = $result->fetchAll();



$sql =
" SELECT
        Id,
        Name
    FROM
        Category
";
$result = $pdo->query($sql);
$categories = $result->fetchAll();






 if(!empty($_POST)){
      // Ajout d'un article du blog.
 
 
 $sql1 =
 "INSERT INTO `post` (`Title`, `Contents`, `CreationTimestamp`, `Author_Id`, `Category_Id`) VALUES (?, ?, NOW(), ?, ?);";
 $result = $pdo->prepare($sql1);
   $result->execute([$_POST['title'], $_POST['content'], $_POST['author'], $_POST['category']]);
   header('Location: admin_posts_index.php'); 
}
 







include 'layout.phtml';


