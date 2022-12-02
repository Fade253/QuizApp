<!DOCTYPE html>
<html>
    <head>
        <style>
            html{
                background-color: powderblue;
            }
            div{
                border:solid thick black;
                    border-collapse:collapse;
                    margin: 15px;
                    background-color: white
            }
            .wrong{
                background-color: pink;
            }
            .correct{
                background-color: greenyellow;
            }
        </style>
   </head>
    <body>

<?php
session_start();
$questions = $_SESSION['thequiz']['questions'];
    $score=0;
?>
<h1>Results</h1>
<?php
$answer = $_SESSION['answer'];
for($i = 0;$i<count($questions);$i++){
    $question=$questions[$i]['questionText'];
    $correct=$_SESSION['thequiz']['questions'][$i]['answer'];
    $num=$i+1;
    $choice = $_SESSION['thequiz']['questions'][$i]['choices'];
    echo '<div><h2>Question'.' '.$num.'</h2>'.'<p>'.$question.'</p>'.'<ol type = "a">';
for($j=0;$j<count($choice);$j++){
    echo "<li>" . "<p>".$choice[$j]."</p>" . "</li>"; 
}   
echo "</ol>";
    if($answer['q'.$i]==$correct){
        echo'<p class="correct">Your Answer: '.$choice[intval($answer['q'.$i])].'</p>';
        $score++;
    }
    else{
        echo'<p class="wrong">Your Answer: '. $choice[intval($answer['q'.$i])] .'</p>'.'<p>Correct Answer: '.$choice[$correct]."</p>";
    }
    echo '</div>';
   
}
echo '<h1>Total Score'.$score."/". count($questions);?>
    </body>
</html>

