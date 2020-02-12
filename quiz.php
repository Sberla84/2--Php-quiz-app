<?php 

session_start();
include('inc/generate_questions.php');
include('inc/header.php'); 

$userAnswer = trim(filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_STRING));
$correct = trim(filter_input(INPUT_POST, 'correct', FILTER_SANITIZE_STRING));
$answers = $_SESSION['answers'];
$question = $_SESSION['question'];
$index = $_SESSION['index'];
$step = false;

if ($userAnswer == $correct){
    $stepResult = "Correct!! "; 
    $_SESSION['score'] ++; 
} else {
    $stepResult = "Thats the wrong answer! "; 
};

echo generateHtml($question,$answers,$index,$step,$stepResult);
$index++;
$_SESSION['index'] = $index;

?>


  </form>
        </div>
     </div>
 </body>
 </html>  
