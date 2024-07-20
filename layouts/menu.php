<nav class='w-full bg-neutral-200'>
    <ul class='flex justify-between uppercase font-bold text-sm text-neutral-900'>
        <li class='px-6 py-3 cursor-pointer'><a href="index.php">strona główna</a></li>
        <div class='flex'>
            <?php
                if(!isset($_SESSION['userId'])){
                    echo '<li class="px-6 py-3 cursor-pointer"><a href="login.php">logowanie</a></li>';
                    echo '<li class="px-6 py-3 cursor-pointer"><a href="signUp.php">rejestracja</a></li>';
                }
                else{
                    if($_SESSION['role'] == 'admin'){
                        echo '<li class="px-6 py-3 cursor-pointer"><a href="userPanel.php">panel administracyjny</a></li>';
                    }
                    echo '<li class="px-6 py-3 cursor-pointer"><a href="includes/login/logoutHandle.php">wyloguj się</a></li>';
                }
            ?>
        </div>
    </ul>
</nav>