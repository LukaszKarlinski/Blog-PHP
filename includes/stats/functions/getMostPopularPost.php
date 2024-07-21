<?php

function getMostPopularPost($pdo){
    $query = 'SELECT a.id, a.title, COUNT(l.article_id) AS likesCount FROM articles a LEFT JOIN likes l ON a.id = l.article_id GROUP BY a.id ORDER BY `likesCount` DESC LIMIT 1';

    $statement = $pdo->query($query);

    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result;
}