<?php

try{
    require_once __DIR__ .  '/../dbconnection.php';
    require_once 'functions/getUsersCount.php';
    require_once 'functions/getLikesCount.php';
    require_once 'functions/getMostPopularPost.php';
    
    $usersCount = getUsersCount($pdo);
    $likesCount = getLikesCount($pdo);
    $post = getMostPopularPost($pdo);
    
    $statement = null;
    $pdo = null;

}
catch(PDOException $e){
    die('Query failed ' . $e->getMessage());
}

