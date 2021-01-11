 

 
 <?php
  include "app/connect.php";
 $sql =
    "DELETE FROM
            Post
        WHERE
            Id = ?
    ";
    $result = $pdo->prepare($sql);
    $result->execute([$_GET['id']]);
  
    

    header('Location: admin_posts_index.php');
    exit();