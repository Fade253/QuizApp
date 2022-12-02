<?php
include 'FileUtils.php';
include 'ChromePhp.php';
session_start();
$file=$_POST['quizzes'];
$name;
if($file=="Geography"){
    $name="WorldGeography.json";
}
else if($file=="Numbers"){
    $name="NumberSystems.json"; 
}
else{
    $name="EasterEggQuiz.json";
}
$read=readFileIntoString($name);
$quiz=json_decode($read,true);
$_SESSION['thequiz']=$quiz;
$_SESSION['curqnum']=0;
$_SESSION['answer']=array();
$questions=$quiz['questions'];
for($i = 0;$i<count($questions);$i++){
    $_SESSION['answer']["q".$i]=-1;
}
header("location:showQuestion.php");

