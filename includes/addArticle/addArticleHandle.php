<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //get inputs values
    $title = $_POST['title'];
    $content = $_POST['content'];

    try{
        require_once '../dbconnection.php';

        //handle errors
        $errors = [];
        
        //check empty inputs
        if(empty($title) || empty($content)){
            $errors['emptyInputs'] = 'Wypełnij wszystkie pola';
        }


        //pass errors to session variable
        require_once '../configSession.php';

        if($errors){
            $_SESSION['errorsAddArticle'] = $errors;
            header('Location: ../../userPanel.php');
            die();
        }

        //save article to the database
        require_once 'functions/saveArticle.php';
        saveArticle($pdo, $title, $content);

        //send back to userpanel
        header('Location: ../../userPanel.php?add=success');

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