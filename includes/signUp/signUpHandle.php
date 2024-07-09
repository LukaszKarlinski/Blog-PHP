<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //get inputs values
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];


    try{
        require_once '../dbconnection.php';


        //error handling
        $errors = [];

        //check empty inputs
        if(empty($username) || empty($password) || empty($email)){
            $errors['empty_input'] = 'Wypełnij wszystkie pola';
        }

        //check valid email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['invalid_email'] = 'Podaj prawidłowy e-mail';
        }

        //check username taken
        require_once './functions/getUsername.php';

        if(getUsername($pdo, $username)){
            $errors['username_taken'] = 'Nazwa użytkownika jest zajęta';
        }


        //pass errors to session variable
        require_once '../configSession.php';

        if($errors){
            $_SESSION['errorsSignUp'] = $errors;
            header('Location: ../../signUp.php');
            die();
        }

        //save user into database
        require_once './functions/setUser.php';
        setUser($pdo, $username, $password, $email);

        header("Location: ../../signUp.php?signup=success");

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

