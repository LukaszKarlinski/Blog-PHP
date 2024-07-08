<?php

function getUsername($pdo, $username){
    $query = "SELECT username FROM users WHERE username = :username;";

    $statement = $pdo->prepare($query);
    $statement->bindParam(":username", $username);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}