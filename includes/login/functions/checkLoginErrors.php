<?php

function checkLoginErrors(){
    //checking errors
    if(isset($_SESSION['errorsLogin'])){
        //take errors from session variable
        $errors = $_SESSION['errorsLogin'];

        //show errors
        foreach($errors as $error){
            echo "<p class='text-center text-red-500'>" . $error . "</p>";
        }

        unset($_SESSION['errorsLogin']);
    }
    //checking sucess login
    else if(isset($_GET['login']) && $_GET['login'] === 'success'){
        echo "<p class='text-center text-green-500'>Zalogowano pomyślnie</p>";
    }
}