<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JSON Quiz</title>
        <style>
            div{
                border:solid thin black;
                    border-collapse:collapse;
                    margin: 15px;
                    padding:30px;
                    font: 30px;
                     background-color: white
            }
            html{
                background-color: powderblue;
            }
            
        </style>
    </head>
    <body>
        <?php
        include 'ChromePhp.php';
        include 'FileUtils.php';
        session_start();
        ?>
        <h1>Quiz Selection</h1>
        <p>Select a quiz to start</p>
        <form action="build.php" method="POST">
            <select name="quizzes">
                <option value="Geography">Geography
                </option>
                <option value="Numbers">Number systems</option>
                <option value="Easter">Easter Egg</option>
            </select>   
            <button type="submit">Ready?</button>
            </form>
    </body>
</html>
