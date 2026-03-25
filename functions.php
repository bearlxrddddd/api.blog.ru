<?php
function getPosts($pdo)
{
$sql = "SELECT * FROM `posts`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($posts);
}

function getPost($pdo, $id){
$sql = "SELECT * FROM `posts`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($posts);
}