<?php 
session_start();
include('inc/generate_questions.php');
include('inc/header.php');

if (isset($_COOKIE['lastScore'])) {
    $lastScore = "<p class='quiz'>Your last score is " . $_COOKIE['lastScore'];
} else {
    $lastScore = "";
}

setcookie("lastScore", $_SESSION['score'], strtotime("+1 year"));


?>
<p class='quiz'>You did <?php echo $_SESSION['score'];?> correct answers!</p>
<?php echo $lastScore ?>
<a class='play-again' href='index.php'>PLAY AGAIN</a>
</form>
        </div>
    </div>
</body>
</html>