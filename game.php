<?php 
session_start();
include('inc/generate_questions.php');
include('inc/header.php');

$index = $_SESSION['index'];
$step = true;
// $stepResult = "Correct!! ";
generateQuestion();
echo generateHtml($question,$answers,$index,$step,$stepResult);

?>


</form>
        </div>
    </div>
</body>
</html>