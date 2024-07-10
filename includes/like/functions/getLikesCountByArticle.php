<?php 

function getLikesCountByArticle($pdo, $articleId){
    $query = "SELECT COUNT(*) FROM likes WHERE article_id=:articleId";

    $statement = $pdo->prepare($query);
    $statement->bindParam(':articleId', $articleId);
    $statement->execute();

    $result = $statement->fetchColumn();
    return $result;
}