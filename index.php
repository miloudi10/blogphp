
<?php

include "app/connect.php";
$sql="SELECT post.Id,`Title`,(`Contents`)  , DATE(`CreationTimestamp`) AS DATE, category.Name,author.FirstName,author.LastName 
FROM `post` 
INNER JOIN category 
ON post.Category_Id = category.Id 
INNER JOIN author 
ON post.Author_Id = author.Id ";
$reponse = $pdo->prepare($sql);
$reponse->execute(array());
$posts = $reponse->fetchAll(PDO::FETCH_ASSOC);


$title = 'Accueil du blog de Tante Ursule';
$template = 'index';


include 'layout.phtml';

