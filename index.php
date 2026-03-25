<?php
//http://api.blog.ru/posts.php
// die($_GET['q']);
require 'connectDB.php';
require 'functions.php';
header('Content-Type: application/json');


$params = explode('/', $_GET['q']);
$type = $params[0];
$id = $params[1];

if ($type === 'posts') {
    if (isset($id)) {
        getPost($pdo, 'id');
    }else {
        getPosts($pdo);
    }
}

