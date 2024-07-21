<?php

function getUsersCount($pdo){
    $query = 'SELECT COUNT(*) FROM users';

    $statement = $pdo->query($query);
    $result = $statement->fetchColumn();

    return $result;
}