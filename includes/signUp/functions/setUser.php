<?php 

function setUser($pdo, $username, $password, $email){
    $query = "INSERT INTO users(username, password, email) VALUES(:username, :password, :email);";
    $statement = $pdo->prepare($query);

    //hashing password
    $options=[
        'cost' => 12
    ];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    //bind parameters
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $hashedPassword);
    $statement->bindParam(':email', $email);

    $statement->execute();

}