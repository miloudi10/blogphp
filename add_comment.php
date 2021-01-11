<?php
include "app/connect.php";

    $sql2="INSERT INTO `comment` ( `NickName`, `Contents`, `CreationTimestamp`, `Post_Id`) 
    VALUES (  ?,?, NOW(), ?)";
    
$result = $pdo->prepare($sql2);
$result->execute([$_POST['pseudo'], $_POST['comment'],$_POST['postId']]);




header('Location: show_post.php?id='.$_POST['postId']);
exit();

