<?php

function getLikesByUserId($pdo, $userId){
    $query = 'SELECT * FROM likes WHERE user_id=:userId';
    
    $statement = $pdo->prepare($query);
    $statement->bindParam(':userId', $userId);
    $statement->execute();
    
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}