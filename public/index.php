<?php
require "../app/models/Post.php";
require "../app/controllers/PostController.php";

use app\controllers\PostController;


$url = strtok($_SERVER["REQUEST_URI"], '?');


$uriArray = explode("/", $url);

if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->getPosts();
}

if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/Post.html';
}

if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $postController = new PostController();
    $postController->savePost();
}

if ($uriArray[1] === 'add-post' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/AddPost.html';
}

if ($url === '/' || $url === '') {
    echo '<h1>Welcome</h1>';
    echo '<ul>';
    echo '<li><a href="/posts">View Posts</a></li>';
    echo '<li><a href="/add-post">Add Post</a></li>';
    echo '</ul>';
}