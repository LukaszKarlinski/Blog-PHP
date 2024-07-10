<?php

function showAllArticles($pdo){
    //get all articles
    require_once 'getAllArticles.php';
    $articles = getAllArticles($pdo);

    //print all articles
    foreach($articles as $article){

        //get data about article
        $id = $article['id'];
        $title = htmlspecialchars($article['title']);
        $date = htmlspecialchars($article['created_at']);
        $formateDate = date('d-m-Y', strtotime($date));
        $content = htmlspecialchars($article['content']);

        //print article
        echo "<div class='relative bg-neutral-200 text-neutral-900 rounded-xl p-5'>";
        //delete article option if user is admin
        if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
            echo '<div class="showDeletePopup absolute top-4 right-4 cursor-pointer"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                    </svg> 
                </div>';
            echo "<div class='deletePopup hidden absolute inset-0 flex justify-center items-center bg-neutral-900/70'>
                    <div class='bg-neutral-900 text-neutral-200 h-fit p-5 rounded-xl'>
                        <h2> Czy na pewno chcesz usunąć ten wpis?</h2>
                        <div class='m-auto w-fit mt-8'>
                            <button data-articleId='$id' class='deleteArticleButton bg-neutral-200 text-neutral-900 font-semibold py-1 px-4 rounded-md'>Tak</button>
                            <button class='closePopup bg-neutral-200 text-neutral-900 font-semibold py-1 px-4 ml-5 rounded-md'>Nie</button>
                        </div>
                    </div>
                </div>";
        }
        echo   "<h1 class='text-2xl font-bold'>" . $title . "</h1>
            <p class='mb-3 text-xs'>" . $formateDate . "</p>
            <p class=' font-medium text-justify'>" . $content . "</p>
        </div>";
    }
}