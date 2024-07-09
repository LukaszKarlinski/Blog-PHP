<nav class='w-full bg-neutral-200'>
    <ul class='flex justify-evenly uppercase font-bold text-sm text-neutral-900'>
        <li class='px-6 py-3 cursor-pointer'><a href="index.php">strona główna</a></li>
        <?php
            if(!isset($_SESSION['userId'])){
                echo '<li class="px-6 py-3 cursor-pointer"><a href="login.php">logowanie</a></li>';
                echo '<li class="px-6 py-3 cursor-pointer"><a href="signUp.php">rejestracja</a></li>';
            }
            else{
                echo '<li class="px-6 py-3 cursor-pointer"><a href="includes/login/logoutHandle.php">wyloguj się</a></li>';
            }
        ?>
    </ul>
</nav>