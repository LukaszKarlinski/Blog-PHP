<?php

require_once '../configSession.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['userId'])){
    //get data from post and session
    $userId = $_SESSION['userId'];
    $articleId = $_POST['articleId'];

    try{
        //save like to database
        require_once '../dbconnection.php';
        require_once 'functions/saveLike.php';
        saveLike($pdo, $userId, $articleId);

        header('Location: ../../index.php');

        //clear connection
        $pdo = null;
        $statement = null;

        die();
    }
    catch(PDOException $e){
        die('Query failed ' . $e->getMessage());
    }
}
else{
    header('Location: ../../index.php');
}