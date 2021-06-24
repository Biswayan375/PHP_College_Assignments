<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./calculator.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="heading">
                A Simple Calculator
            </div>
            <form action="#" method="post" class="calculator">
                <div style="text-align: center;">
                    <input style="background-color: burlywood; color: #a05520" name="input1" class="input1" placeholder="Enter 1st number" type="number" value="<?php if(isset($_POST["input1"])) echo $_POST["input1"]; ?>">
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $in1 = $_POST["input1"];
                            if($in1 != ""){
                                echo '<div class="inputSuggestion">Great work!</div>';
                                $_POST["input1"] = $in1;
                            }else{
                                echo '<div class="inputErrorSuggestion">You must enter a number</div>';
                            }
                        }
                    ?>
                </div>
                <select name="selectInput" class="selectInput" value = "^">
                    <?php
                        if($_SERVER['REQUEST_METHOD'] == "POST"){
                            $op = $_POST["selectInput"];
                            if($op == "*"){
                                echo '
                                <option value="+">+</option>
                                <option value="-">-</option>
                                <option value="*" selected>*</option>
                                <option value="/">/</option>';
                            }else if($op == "/"){
                                echo '
                                <option value="+">+</option>
                                <option value="-">-</option>
                                <option value="*">*</option>
                                <option value="/" selected>/</option>';
                            }else if($op == "+"){
                                echo '
                                <option value="+" selected>+</option>
                                <option value="-">-</option>
                                <option value="*">*</option>
                                <option value="/">/</option>';
                            }else if($op == "-"){
                                echo '
                                <option value="+">+</option>
                                <option value="-" selected>-</option>
                                <option value="*">*</option>
                                <option value="/">/</option>';
                            }
                        }else{
                            echo '
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">*</option>
                            <option value="/">/</option>';
                        }
                    ?>
                </select>
                
                <div style="text-align: center;">
                    <input style="background-color: khaki; color: #687907" name="input2" class="input2" placeholder="Enter 2nd number" type="number" value="<?php if(isset($_POST["input2"])) echo $_POST["input2"]; ?>">
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $in2 = $_POST["input2"];
                            $op = $_POST["selectInput"];
                            if($in2 == "0" && $op == "/"){
                                echo '<div class="inputWarningSuggestion">Are you sure?</div>';
                            }else if($in2 != ""){
                                echo '<div class="inputSuggestion">Awesome!</div>';
                                $_POST["input2"] = $in2;
                            }else{
                                echo '<div class="inputErrorSuggestion">You must enter a number</div>';
                            }
                        }
                    ?>
                </div>
                <input name="output" class="output" placeholder="You'll see the result here" type="text" value="<?php  
                    if(isset($_POST['input1']) && isset($_POST['input2'])){
                        $in1 = $_POST["input1"];
                        $in2 = $_POST["input2"];
                        $op = $_POST["selectInput"];
                        if($in1 != "" && $in2 != ""){
                            switch ($op) {
                                case '+':
                                    $result = (int)$in1 + (int)$in2;
                                    echo "$result";
                                    break;
                                
                                case '-':
                                    $result = (int)$in1 - (int)$in2;
                                    echo "$result";
                                    break;

                                case '*':
                                    $result = (int)$in1 * (int)$in2;
                                    echo "$result";
                                    break;

                                case '/':
                                    if($in2 != 0){
                                        $result = (int)$in1 / (int)$in2;
                                        echo "$result";
                                    }else{
                                        echo "Division by 0 is not allowed!";
                                    }
                                    break;
                            }
                        }
                    }
                ?>" readonly>
                <button class="submit" type="submit">Calculate</button>
            </form>
        </div>
    </div>
</body>
</html>