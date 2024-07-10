<?php 
    require_once 'includes/configsession.php';
    require_once 'includes/dbconnection.php';
    require_once 'includes/showArticles/functions/showAllArticles.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class='min-h-screen w-full flex flex-col bg-neutral-900'>
        <?php require_once 'layouts/menu.php' ?>
        <div class=' flex-1 flex justify-center py-10'>
            <div class='flex flex-col gap-5 w-2/3'>
                <?php showAllArticles($pdo); ?>
            </div>
        </div>
    </div>

    <script src='assets/js/deleteArticle.js'></script>
</body>
</html>