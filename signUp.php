<?php
    require_once 'includes/configSession.php';
    require_once 'includes/signUp/functions/checkSignupErrors.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class='h-screen w-full flex flex-col'>
        <?php require_once 'layouts/menu.php' ?>
        <div class='flex-1 flex justify-center items-center bg-neutral-900 text-neutral-200'>
            <div class='w-1/4 shadow-md shadow-neutral-200 py-10 px-5 rounded-3xl'>
                <h1 class='uppercase text-center text-3xl font-bold tracking-wider my-3'>rejestracja</h1>
                <form action="includes/signUp/signUpHandle.php" method="post" class='flex flex-col'>
                    <div class='flex flex-col my-3'>
                        <label for="username" class='mb-1 capitalize'>nazwa użytkownika</label>
                        <input type="text" name="username" class='outline-0 bg-neutral-600 text-neutral-300 rounded-xl py-1 px-2 ring-neutral-300 focus:ring-2'>
                    </div>
                    <div class='flex flex-col my-3' >
                        <label for="password" class='mb-1 capitalize'>hasło</label>
                        <input type="password" name="password" class='outline-0 bg-neutral-600 text-neutral-300 rounded-xl py-1 px-2 ring-neutral-300 focus:ring-2'>
                    </div>
                    <div class='flex flex-col my-3'>
                        <label for="email" class='mb-1 capitalize'>e-mail</label>
                        <input type="text" name="email" class='outline-0 bg-neutral-600 text-neutral-300 rounded-xl py-1 px-2 ring-neutral-300 focus:ring-2'>
                    </div>
                    <?php checkSignupErrors(); ?>
                    <button class='bg-neutral-200 text-neutral-900 rounded-xl mt-2 px-5 py-2 mx-auto uppercase font-bold'>zarejestruj</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>