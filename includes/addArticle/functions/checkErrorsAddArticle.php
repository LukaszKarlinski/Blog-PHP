<?php 

function checkAddArticleErrors(){
    if(isset($_SESSION['errorsAddArticle'])){
        $errors = $_SESSION['errorsAddArticle'];
    
        foreach($errors as $error){
            echo "<p class='text-center text-red-500'>" . $error . "</p>";
        }
    
        unset($_SESSION['errorsAddArticle']);
    }
    else if(isset($_GET['add']) && $_GET['add'] === 'success'){
        echo "<p class='text-center text-green-500'>Nowy wpis został dodany</p>";
    }
}
