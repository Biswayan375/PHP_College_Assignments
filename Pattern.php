<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patterns</title>
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
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            min-width: 100vw;
            /* background-color: rgb(0, 0, 0, 0.8); */
            background: linear-gradient(34deg, black, #161603a6);
        }
        .container{
            border-radius: 5px;
            padding: 20px;
            background-color: #1d1d1d;
            color: #f3f7ba;
            box-shadow: 0px 0px 13px 6px #1616157a;
            min-width: 150px;
            max-width: 450px;
            margin-bottom: 2px;
        }
        .showButton{
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
            background-color: #5d5d5d;
            font-weight: bold;
            color: #22fd08;
            border-style: none;
            padding: 4px;
            transition: 0.5s;
            display: block;
            margin: auto;
            width: 30%;
        }
        .showButton:hover{
            background-color: #22fd08;
            color: #5d5d5d;
        }
        .input{
            border-radius: 3px;
            border-style: none;
            padding: 3px;
            background-color: #9b9b9b3b;
        }
        .input:focus{
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <p style="font-size: 20px; letter-spacing: 3px; text-align: center">How do you want to see the pattern?</p>
        <form action="#" method="POST">
            <section style="text-align: center; margin-bottom: 10px;">
                <input onchange="handleCharInputChange(event)" id="charInput" class="input" name="char" style="width: 49%; text-align: center" type="text" placeholder="Enter the character" maxlength="1" required value="<?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["char"])){
                        echo $_POST["char"];
                    }
                ?>">
                <section id="lineSection" style="display: inline-block;width: 49%; text-align: center">    
                    
                </section>
            </section>
            <section style="text-align: center; margin-bottom: 10px;">
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            if($_POST["typeSelect"] == "kShape")
                                echo '<select class="input" name="typeSelect" id="typeSelect">
                                    <option value="kShape" selected>K-Shape</option>
                                    <option value="rkShape">Reversed K-Shape</option>
                                </select>';
                            elseif($_POST["typeSelect"] == "rkShape")
                                echo '<select class="input" name="typeSelect" id="typeSelect">
                                    <option value="kShape">K-Shape</option>
                                    <option value="rkShape" selected>Reversed K-Shape</option>
                                </select>';
                        }else{
                            echo '<select class="input" name="typeSelect" id="typeSelect">
                                <option value="kShape" selected>K-Shape</option>
                                <option value="rkShape">Reversed K-Shape</option>
                            </select>';
                        }
                    ?>
                
            </section>
            <button class="showButton">Show!</button>
        </form>
    </div>
    <div style="min-width: 450px; color: green;" class="container">    
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST["char"]) && isset($_POST["line"])){
                    $ch = $_POST["char"];
                    $l = $_POST["line"];
                    if($_POST["typeSelect"] == "kShape"){
                        if($ch >= 0 && $ch <= 9){
                            
                            $i = 0;
                            $a = $ch;
                            while($i < $l){
                                $j = 1;
                                while($j <= $a){
                                    echo "$j";
                                    $j++;
                                }
                                echo "<br>";
                                $i++;
                                $a--;
                            }

                            $a += 2;
                            $i = 1;
                            while($i < $l){
                                $j = 1;
                                while($j <= $a){
                                    echo "$j";
                                    $j++;
                                }
                                echo "<br>";
                                $i++;
                                $a++;
                            }

                        }else{
                            $i = 0;
                            while($i < $l){
                                $j = 0;
                                while($j < ($l - $i)){ 
                                    echo "$ch";
                                    $j++;
                                }
                                echo "<br>";
                                $i++;
                            }
                            $i = 1;
                            while($i < $l){
                                $j = 0;
                                while($j <= $i){
                                    echo "$ch";
                                    $j++;
                                }
                                echo "<br>";
                                $i++;
                            }
                        }

                    }else{
                        if($ch >= 0 && $ch <= 9){

                            $i = 0;
                            $a = $ch;
                            while($i < $l){
                                $j = 0;
                                while($j < $i){
                                    echo "&nbsp;&nbsp;";
                                    $j++;
                                }
                                $j = $a;
                                while($j > 0){
                                    echo "$j";
                                    $j--;
                                }
                                echo "<br>";
                                $i++;
                                $a--;
                            }
                            $i -= 2;
                            while($i >= 0){
                                $j = 0;
                                while($j < $i){
                                    echo "&nbsp;&nbsp;";
                                    $j++;
                                }
                                $j = $ch - $i;
                                while($j > 0){
                                    echo "$j";
                                    $j--;
                                }
                                echo"<br>";
                                $i--;
                            }


                        }else{
                            $i = 0;
                            while($i < $l){
                                $j = 0;
                                while($j < $i){
                                    echo "&nbsp;&nbsp;";
                                    $j++;
                                }
                                $j = 0;
                                while($j < ($l - $i)){ 
                                    echo "$ch";
                                    $j++;
                                }
                                echo "<br>";
                                $i++;
                            }
                            $i = 2;
                            while($i <= $l){
                                $j = $i;
                                while($j < $l){
                                    echo "&nbsp;&nbsp;";
                                    $j++;
                                }
                                $j = 1;
                                while($j <= $i){
                                    echo "$ch";
                                    $j++;
                                }
                                echo "<br>";
                                $i++;
                            }
                        }
                    }
                }
            }
        ?>
    </div>

    <script>
        var lineSection = document.getElementById("lineSection");
        const charInput = document.getElementsByClassName("charInput");

        lineSection.innerHTML = '<input style="width: 100%; text-align: center" class="input" name="line" type="number" placeholder="Enter no. of lines" max="15" min="1" required value="<?php 
                        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["line"])){
                            echo $_POST["line"];
                        }
                    ?>">'
        
        function handleCharInputChange(event){
            if(event.target.value >= 0 && event.target.value <= 9){
                lineSection.innerHTML = '<input style="width: 100%; text-align: center" class="input" name="line" type="number" placeholder="Enter no. of lines" max=' + '"' + event.target.value + '"' + ' min="1" required value="<?php 
                        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["line"])){
                            echo $_POST["line"];
                        }
                    ?>">';
            }
            else{
                lineSection.innerHTML = '<input style="width: 100%; text-align: center" class="input" name="line" type="number" placeholder="Enter no. of lines" max="15" min="1" required value="<?php 
                        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["line"])){
                            echo $_POST["line"];
                        }
                    ?>">'
            }
        }
    </script>
</body>
</html>