<?php

function checkSignupErrors(){

    //checking errors
    if(isset($_SESSION['errorsSignUp'])){
        //take errors from session variable
        $errors = $_SESSION['errorsSignUp'];

        //showe errors
        foreach($errors as $error){
            echo "<p class='text-center text-red-500'>" . $error . "</p>";
        }
        
        //clear session variable
        unset($_SESSION['errorsSignUp']);
    }
    //checking success sign up
    else if(isset($_GET['signup']) && $_GET['signup'] === 'success'){
        echo "<p class='text-center text-green-500'>Rejestracja przebiegła pomyślnie</p>";
    }
}