<?php
// Generate random questions
session_start();

function generateQuestion(){
    // clear answers array so we use it to shuffle only current datas 
    unset($answers);
    global $answers;
    global $question;
    // Get random numbers to add
    $leftAdder = rand(1,99);
    $rightAdder = rand(1,99);
    // Calculate correct answer
    $correctAnswer = $leftAdder + $rightAdder;
    // Get incorrect answers within 10 numbers either way of correct answer
    $firstIncorrectAnswer = $correctAnswer + rand(1,10);
    $secondIncorrectAnswer = $correctAnswer - rand(1,10);
    // Add question and answer to questions array
    $question[] = 
        [
            "leftAdder" => $leftAdder,
            "rightAdder" => $rightAdder,
            "correctAnswer" => $correctAnswer
        ];

    // create an array of answers and shuffle so the position of answers is always random
    $answers =  [ $correctAnswer, $firstIncorrectAnswer, $secondIncorrectAnswer];
    shuffle($answers);
    $_SESSION['answers'] = $answers;
    $_SESSION['question'] = $question;

};



// function to dinamically create HTML with question and answer 
function generateHtml($question,$answers,$index,$step,$stepResult){
    global $index;
    global $ind;
    $ind = 0;

    //check if the function is used to print question or results
    if ($step){
        $button1Class = 'btn';
        $button2Class = 'btn';
        $button3Class = 'btn';
        $disableButton = '';
        $printQuestion = "<p class='quiz'>What is " . $question[$ind]['leftAdder']  . " + "  . $question[$ind]['rightAdder'] . " ? </p>";
        $nextOneButton = "";
    } else {
        $disableButton = 'disabled';
        $printQuestion = "<p class='quiz'> $stepResult " . $question[$ind]['leftAdder']  . " + "  . $question[$ind]['rightAdder'] . " = ". $question[$ind]['correctAnswer'] ." </p>";
        
        // check if the game is over
        if ($index >= 10){
            $nextOneButton = "<a class='next-question' href='results.php'>VIEW RESULTS</a>";
        } else {
            $nextOneButton = "<a class='next-question' href='game.php'>NEXT QUESTION</a>";
        }
        
        // apply colors to correct and wrong answer
        if ($answers[0] == $question[$ind]['correctAnswer']){
            $button1Class = 'right';
            $button2Class = 'wrong';
            $button3Class = 'wrong'; 
        } else if ($answers[1] == $question[$ind]['correctAnswer']) {
            $button1Class = 'wrong';
            $button2Class = 'right';
            $button3Class = 'wrong'; 
        } else if ($answers[2] == $question[$ind]['correctAnswer']) {
            $button1Class = 'wrong';
            $button2Class = 'wrong';
            $button3Class = 'right'; 
        }
    };

    $output = "<p class='breadcrumbs'>Question $index of 10</p>"
            . $printQuestion
            ."<form action='quiz.php' method='post'>"
            ."<input type='hidden' name='correct' value='". $question[$ind]['correctAnswer'] ."' />"
            ." <input type='submit' ". $disableButton ." class='" . $button1Class . "' name='answer' value=" . $answers[0] . ">"
            ." <input type='submit' ". $disableButton ." class='" . $button2Class . "' name='answer' value=" . $answers[1] . ">"
            ." <input type='submit' ". $disableButton ." class='" . $button3Class . "' name='answer' value=" . $answers[2] . ">"
            ." </form>"
            .$nextOneButton;

    return $output;

};



