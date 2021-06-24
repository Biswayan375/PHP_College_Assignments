<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patterns And Tables</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* background-color: rgb(0, 0, 0, 0.8); */
            background: linear-gradient(34deg, black, #161603a6);
        }
        label{
            cursor: pointer;
        }
        .container{
            border-radius: 5px;
            padding: 20px;
            background-color: #1d1d1d;
            color: #f3f7ba;
            box-shadow: 0px 0px 13px 6px #1616157a;
        }
        .goButton{
            width: 100%;
            cursor: pointer;
            font-size: 14px;
            border-radius: 8px;
            background-color: #5d5d5d;
            font-weight: bold;
            color: #22fd08;
            border-style: none;
            padding: 4px;
            transition: 0.5s;
            margin-top: 10px;
        }
        .goButton:hover{
            background-color: #22fd08;
            color: #5d5d5d;
        }
    </style>
</head>
<body>
    <div class="container">
        <p style="font-size: 20px; letter-spacing: 3px; text-align: center">I want to see a</p>
        <form action="#" method="POST">
            <section style="text-align: center;">
                <label for="pattern">Pattern</label>
                <input type="radio" name="option" value="pattern" id="pattern">
                <label for="table">Table</label>
                <input type="radio" name="option" value="table" id="table">
            </section>
            <button class="goButton">Go!</button>
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST["option"])){
                    if($_POST["option"] == "pattern"){
                        header("Location: ./Pattern.php");
                        exit; //exit is mandatory after header in php.
                    }elseif($_POST["option"] == "table"){ 
                        header("Location: ./Table.php");
                        exit; //exit is mandatory after header in php.
                    }
                }
            }
        ?>
    </div>
</body>
</html>