<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    try{
        require_once '../dbconnection.php';

        //handle errors
        $errors = [];

        //check empty inputs
        if(empty($username) || empty($password)){
            $errors['emptyInput'] = 'Wypełnij wszystkie pola';
        }

        //get user data
        require_once 'functions/getUser.php';
        $user = getUser($pdo, $username);

        //check correct username
        if(!$user){
            $errors['worngUsername'] = 'Nieprawidłowa nazwa użytkownika';
        }
        //check correct password
        else{
            if(!password_verify($password, $user['password'])){
                $errors['wrongPassword'] = 'Nieprawidłowe hasło';
            }
        }

        //starting session
        require_once '../configSession.php';

        //pass errors to session variable
        if($errors){
            $_SESSION['errorsLogin'] = $errors;
            header('Location: ../../login.php');
            die();
        }

        //set user data in session
        $_SESSION['userId'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header('Location: ../../login.php?login=success');

        //clear connect
        $pdo = null;
        $statement = null;

        die();
    }
    catch(PDOException $e){
        die("Query failde " . $e->getMessage());
    }

}
else{
    header('Location: ../../index.php');
}