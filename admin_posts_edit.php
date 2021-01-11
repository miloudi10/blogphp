<?php
include 'app/connect.php';
$query =
        'SELECT
                Id,
                FirstName,
                LastName
            FROM
                Author
        ';
        $resultSet = $pdo->query($query);
        $authors = $resultSet->fetchAll();

$query =
    '
    SELECT * FROM `Category` WHERE 1
    ';
    $resultSet = $pdo->query($query);
    $categories = $resultSet->fetchAll();
$query =
"SELECT Post.Id,`Title`,`Contents`,`CreationTimestamp` as date,Category.Name,Author.FirstName,Author.LastName ,`Category_Id`,`Author_Id` FROM `Post` INNER JOIN Category ON Post.Category_Id = Category.Id INNER JOIN Author ON Post.Author_Id = Author.Id WHERE Post.Id=?"
;
    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_GET['id']]);
    $post = $resultSet->fetch();
/**
 * 
 */
if (!empty($_POST)) {
$query =
'UPDATE `Post` SET `Title` = ? ,`Contents` = ?, `CreationTimestamp` = NOW(), `Category_Id` = ? ,`Author_Id`= ? WHERE `Post`.`Id` = ?;
';
$resultSet = $pdo->prepare($query);
$resultSet->execute([$_POST['title'], $_POST['content'], $_POST['category'],$_POST['author'],$_GET['id']]);
header('Location: admin_posts_index.php');
}
$title = 'Créer un article';
$template = 'admin_posts_edit';
include 'layout.phtml';