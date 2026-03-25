<?php
$data = [
'title' => $_POST['title'],
'body' => $_POST['body']

];

function getPosts($pdo)
{
$sql = "SELECT * FROM `posts`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($posts);
}

function getPost($pdo, $id): void{
$sql = "SELECT * FROM `posts` WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

if ($stmt->rowCount() === 1) {
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($post);
}
else {
    http_response_code(404);
    $response = [
        'status' => false,
        'message' => 'post not found'
    ]; 
echo json_encode($response);
}
}

function addPost($pdo, $data){
$pdo = new PDO('mysql:host=localhost;dbname=api', "root", "");
$sql = "INSERT INTO`posts`( `title`, `body`) VALUES (:title, :body)";
$stmt = $pdo -> prepare($sql);
$result = $stmt -> execute($data);
header("Location: ./index.php");
}