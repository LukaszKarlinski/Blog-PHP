<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //get article id
    $articleId = $_POST['articleId'];

    try{
        //delete article from database
        require_once 'dbconnection.php';
        $query = 'DELETE FROM articles WHERE id=:articleId';

        $statement = $pdo->prepare($query);
        $statement->bindParam(':articleId', $articleId);
        $statement->execute();

        if($statement->rowCount() > 0){
            echo 'article deleted successfully';
        }
        else{
            echo 'failed to delete the article';
        }

        header('Location: ../userPanel.php');
        $pdo = null;
        $statement = null;
        die();
    }
    catch(PDOException $e){
        die('Query failed' . $e->getMessage());
    }

}
else{
    header('Location: ../index.php');
}