<?php

function getLikesCount($pdo){
    $query = 'SELECT COUNT(*) FROM likes';

    $statement = $pdo->query($query);
    $result = $statement->fetchColumn();

    return $result;
}