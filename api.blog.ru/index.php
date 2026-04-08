<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
$pdo = NEW PDO('mysql:host=localhost;dbname=api', 'root', '');

//http://api.blog.ru/posts.php
// die($_GET['q']);
require 'functions.php';

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
            if ($type === 'posts') {
                addPost($pdo, $_POST);
            }
            break;
    case 'PATCH':
        if (isset($id)) {
        
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        updatePost($pdo, $data, $id);
        }
        break;
    case 'DELETE':
            if ($type === 'posts') {
                if (isset($id)) {
                    deletePost($pdo, $id);
                }
            }
            break;
            }
