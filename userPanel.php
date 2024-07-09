<?php 
    require_once 'includes/configSession.php';
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
            <?php if($_SESSION['role'] === 'admin'){ ?>
                <div class='w-1/2 bg-neutral-200 text-neutral-900 p-5 rounded-xl'>
                    <h2 class='uppercase font-bold'>dodaj nowy wpis</h2>
                    <div>
                        <form action="inludes/addArticleHandle.php" method='post' class='flex flex-col'>
                            <div class='flex flex-col my-3'>
                                <label for="title" class='font-semibold capitalize my-1'>tytuł</label>
                                <input type="text" name='title' class='outline-0 bg-neutral-100 text-neutral-900 rounded-xl py-1 px-2 ring-neutral-300 focus:ring-2'>
                            </div>
                            <div class='flex flex-col my-3'>
                                <label for="content" class='font-semibold capitalize my-1'>treść</label>
                                <textarea name="content" rows='12' class='resize-none outline-0 bg-neutral-100 text-neutral-900 rounded-xl py-1 px-2 ring-neutral-300 focus:ring-2'></textarea>
                            </div>
                            <button class='w-fit px-4 py-2 bg-neutral-900 text-neutral-200 rounded-md uppercase text-sm font-semibold tracking-wide ml-auto'>dodaj wpis</button>
                        </form>
                    </div>
                </div>
            <?php }; ?>
        </div>
    </div>
</body>
</html>