<?php

function showAllArticles($pdo){
    require_once 'getAllArticles.php';
    $articles = getAllArticles($pdo);

    foreach($articles as $article){

        $title = htmlspecialchars($article['title']);
        $date = htmlspecialchars($article['created_at']);
        $formateDate = date('d-m-Y', strtotime($date));
        $content = htmlspecialchars($article['content']);

        echo 
        "<div class='bg-neutral-200 text-neutral-900 rounded-xl p-5'>
            <h1 class='text-2xl font-bold'>" . $title . "</h1>
            <p class='mb-3 text-xs'>" . $formateDate . "</p>
            <p class=' font-medium'>" . $content . "</p>
        </div>";
    }
}