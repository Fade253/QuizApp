<html>
    <head>
        <title>Questions</title>
        <style>html{
                background-color: powderblue;
            }
            div{
                border:solid thick black;
                    border-collapse:collapse;
                    margin: 20px;
                    background-color: white;
                        padding:20px
            }</style>
    </head>
    <body>

<?php
        include 'ChromePhp.php';
        include 'FileUtils.php';
        session_start();
        if(isset($_POST['question'])){
        $_SESSION['answer']["q".$_SESSION['curqnum']]=$_POST['question'];
        
        }
            if(!isset($_POST['select']))
            {
                $_SESSION['curqnum']+=0;
            }
            else if($_POST['select'] === 'next'){
                $_SESSION['curqnum']+=1;
            }
            else if($_POST['select']=='prev'){
                $_SESSION['curqnum']-=1;
            }
            else if($_POST['select']=='end'){
                for ($i = 0;$i<count($_SESSION['answer']);$i++){
                if(intval($_SESSION['answer']["q".$i])==-1){
                    header("location: Error.php");
                    break;
                }
                else{
                header("location: Results.php");
                }
                }
            }
        $quiz=$_SESSION['thequiz'];
        $question=$quiz['questions'];
        $num=$_SESSION['curqnum'];
        $accu=$num+1;
        $checked=NULL;
        ?>
        <form action="showQuestion.php" method = "POST">
        <?php
        if($_SESSION['curqnum']==0){
            $prev = "<button type='submit' name ='select' value='prev' disabled>Prev</button>";
        }
        else{
        $prev = "<button type='submit' name ='select' value='prev'>Prev</button>";}
          if($_SESSION['curqnum']==count($quiz['questions'])-1){
            $next = "<button type='submit' name ='select' value='next' disabled>Next</button>";
        }
        else{
        $next ="<button type='submit' name='select'value='next'>Next</button>";}
        if($_SESSION['curqnum']==count($question)-1){
            $done = "<button type='submit' name ='select' value='end'>Finish</button>";
        }
        else{
        $done="<button type='submit' name='select' value='end' disabled>Finish</button>";}
            $q = $question[$num];
            echo "<div>" . "<h2>Question ". $accu .'</h2>'.'<h3>'.$q["questionText"].'</h3>';
            $choices = $q["choices"];
            echo "<ol type='a'>";
            for ($j = 0; $j < count($choices); $j++) {
                $c = $choices[$j];
                if($j==$_SESSION['answer']["q".$num])
                {
                    echo "<li>"  . "<input type='radio' name='question'" . 
                        "value='".$j."' checked='checked'>" . $c ."</input>" . "</li>";
                }
                else{
                echo "<li>"  . "<input type='radio' name='question" . 
                        "' value='".$j."'".">" . $c ."</input>" . "</li>"; 
                }
            }
            echo "</ol>";
            echo "</div>";
            echo $prev;
            echo $next;
            echo $done;
        ?>
        </form><!-- comment -->
    </body>
    </html>
   
