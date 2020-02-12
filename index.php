<?php
setcookie("test", 0, time() + 3600);
session_start();
include('inc/header.php');
$_SESSION['index'] = 1;
$_SESSION['score'] = 0; 

?>




        <p class="quiz"> Welcome to the addictions quiz, are you ready to start?</p>
        <form action="game.php" method="post">
      
        <?php
            // check if cookies are enabled if not u cant start the game!
            if(count($_COOKIE) > 0) {
              echo "<p class='cookies-enabled'> Cookies are enabled.</p>";
              echo " <input type='submit' class='btn' name='start' value='START GAME'/>";
            } else {
              echo "<p class='cookies_disabled'> This game require Cookies to be enables, please do it and refresh the page.</p>";
            };
            ?>  
           </form>         
        </div>
    </div>
</body>
</html>

