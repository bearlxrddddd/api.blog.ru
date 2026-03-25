<?php
//http://api.blog.ru/posts.php
// die($_GET['q']);
require 'connectDB.php';
require 'functions.php';
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$params = explode('/', $_GET['q']);
$type = $params[0];
if (isset($params[1])){
    $id = $params[1];
}

switch ($method) {
    case 'GET':
if ($type === 'posts') {
    if (isset($id)) {
        getPost($pdo, $id);
    }else {
        getPosts($pdo);
    }
}
        break;
    case 'POST':
echo "ppppppp"; 
        break;
}
?>
