<?php

function saveLike($pdo, $userId, $articleId){
    $query = 'INSERT INTO likes(user_id, article_id) VALUES(:userId, :articleId)';
    $statement = $pdo->prepare($query);

    $statement->bindParam(':userId', $userId);
    $statement->bindParam(':articleId', $articleId);
    
    $statement->execute();
}