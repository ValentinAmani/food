<?php

include_once('config/mysql.php');

// Recipes
$recipesStatement = $db->prepare('SELECT * FROM recipes WHERE is_enabled = :is_enabled');
$recipesStatement->execute([
    'is_enabled' => 1
]);
$recipes = $recipesStatement->fetchAll();

// Users
$usersStatement = $db->prepare('SELECT * FROM users');
$usersStatement->execute();
$users = $usersStatement->fetch(PDO::FETCH_ASSOC);

if (isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_SESSION['LOGGED_USER']
    ];
}

$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
