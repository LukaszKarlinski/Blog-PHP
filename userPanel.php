<?php 
    require_once 'includes/configSession.php';
    require_once 'includes/addArticle/functions/checkErrorsAddArticle.php';
    require_once 'includes/stats/getStats.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel użytkownika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class='min-h-screen w-full flex flex-col'>
        <?php require_once 'layouts/menu.php'; ?>
        <div class='flex-1 flex flex-col gap-5 bg-neutral-900 text-neutral-200 px-20 py-6'>
            <div>
                <?php echo "<h1 class='text-4xl font-semibold'>Witaj " . $_SESSION['username'] . "!</h1>"; ?>
            </div>
            <div class="flex gap-5">
                <div class='w-1/2 bg-neutral-200 text-neutral-900 p-5 rounded-xl'>
                    <h2 class='uppercase font-bold'>dodaj nowy wpis</h2>
                    <div>
                        <form action="includes/addArticle/addArticleHandle.php" method='post' class='flex flex-col'>
                            <div class='flex flex-col my-3'>
                                <label for="title" class='font-semibold capitalize my-1'>tytuł</label>
                                <input type="text" name='title' class='outline-0 bg-neutral-100 text-neutral-900 rounded-xl py-1 px-2 ring-neutral-300 focus:ring-2'>
                            </div>
                            <div class='flex flex-col my-3'>
                                <label for="content" class='font-semibold capitalize my-1'>treść</label>
                                <textarea name="content" rows='12' class='resize-none outline-0 bg-neutral-100 text-neutral-900 rounded-xl py-1 px-2 ring-neutral-300 focus:ring-2'></textarea>
                            </div>
                            <?php checkAddArticleErrors(); ?>
                            <button class='w-fit px-4 py-2 bg-neutral-900 text-neutral-200 rounded-md uppercase text-sm font-semibold tracking-wide ml-auto'>dodaj wpis</button>
                        </form>
                    </div>
                </div>
                <div class='w-1/2 px-5' >
                    <h2 class="text-4xl font-bold uppercase tracking-wider text-center my-5">Statystyki</h2>
                    <div class='flex justify-between text-2xl border-b-2 my-4'>
                        <h3>Liczba użytkowników: </h3>
                        <h3> <?php echo $usersCount ?></h3>
                    </div>
                    <div class='flex justify-between text-2xl border-b-2 my-4'>
                        <h3>Liczba wszystkich polubień:</h3>
                        <h3><?php echo $likesCount ?></h3>
                    </div>
                    <div class='flex flex-col justify-between text-2xl my-8'>
                        <h3> Najpopularnieszy wpis: </h3>
                        <div class='bg-neutral-200 text-neutral-900 my-8 px-5 py-2 rounded-xl w-fit'>
                            <h3 class='my-2 text-xl font-semibold'><?php echo $post['title']; ?></h3>
                            <h3 class='text-xl'> Polubienia: <?php echo $post['likesCount'] ?></h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>