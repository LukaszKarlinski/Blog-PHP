<?php

function saveArticle($pdo, $title, $content){
    $query = "INSERT INTO articles(title, content) VALUES (:title, :content)";

    $statement = $pdo->prepare($query);
    $statement->bindParam(':title', $title);
    $statement->bindParam(':content', $content);
    $statement->execute();
}