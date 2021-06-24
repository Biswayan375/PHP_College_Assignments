<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Functions</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            box-sizing: border-box;
        }
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #212121;
        }
        .box{
            padding: 20px;
            border-radius: 7px;
            background-color: #4949493b;
            box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 20%);
            width: 25em;
        }
        .heading{
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .form{
            display: flex;
            flex-direction: column;
            margin-bottom: 25px;
        }
        .input{
            background-color: #2a2a2a;
            font-size: 17px;
            padding: 3px;
            border-style: none;
            border-bottom: 1px solid blueviolet;
            color: blueviolet;
        }
        .input:focus{
            outline: none;
        }
        .check{
            padding: 7px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
            background-color: blueviolet;
            color: white;
            border-style: none;
            border-radius: 3px;
        }
        .check:hover{
            background-color: #8a2be2cf;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <section class="heading"><span style="color: blueviolet;" class="heading">Special</span> <span style="color: grey;">Numbers</span></section>
            <form action="#" method="POST">
                <div class="form">
                    <label style="color: grey;" for="input">The number is</label>
                    <input type="number" name="input" id="input" class="input" value="<?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            echo $_POST["input"];
                        }
                    ?>">
                </div>

                <div class="form">
                    <label style="color: grey;" for="select">What do you want to check?</label>
                    <select name="select" id="select" class="select input">
                        <?php
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                                if($_POST["select"] == "prime")
                                    echo '<option value="prime" selected>Is it prime?</option>
                                    <option value="palin">Is it palindromic?</option>
                                    <option value="perfect">Is it perfect?</option>
                                    <option value="armst">Is it Armstrong?</option>
                                    <option value="auto">Is it Automorphic?</option>';
                                elseif ($_POST["select"] == "palin")
                                    echo '<option value="prime">Is it prime?</option>
                                    <option value="palin" selected>Is it palindromic?</option>
                                    <option value="perfect">Is it perfect?</option>
                                    <option value="armst">Is it Armstrong?</option>
                                    <option value="auto">Is it Automorphic?</option>';
                                elseif($_POST["select"] == "perfect")
                                    echo '<option value="prime">Is it prime?</option>
                                    <option value="palin">Is it palindromic?</option>
                                    <option value="perfect" selected>Is it perfect?</option>
                                    <option value="armst">Is it Armstrong?</option>
                                    <option value="auto">Is it Automorphic?</option>';
                                elseif ($_POST["select"] == "armst")
                                    echo '<option value="prime">Is it prime?</option>
                                    <option value="palin">Is it palindromic?</option>
                                    <option value="perfect">Is it perfect?</option>
                                    <option value="armst" selected>Is it Armstrong?</option>
                                    <option value="auto">Is it Automorphic?</option>';
                                elseif($_POST["select"] == "auto")
                                echo '<option value="prime">Is it prime?</option>
                                <option value="palin">Is it palindromic?</option>
                                <option value="perfect">Is it perfect?</option>
                                <option value="armst">Is it Armstrong?</option>
                                <option value="auto" selected>Is it Automorphic?</option>';
                            }else{
                                echo '<option value="prime">Is it prime?</option>
                                <option value="palin">Is it palindromic?</option>
                                <option value="perfect">Is it perfect?</option>
                                <option value="armst">Is it Armstrong?</option>
                                <option value="auto">Is it Automorphic?</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form">
                    <input type="text" class="input" name="output" value="<?php
                            if($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST["input"] != "" || $_POST["input"] != null)){
                                $num = $_POST["input"];
                                if($num >= 0){
                                    switch ($_POST["select"]) {
    
                                        case 'prime':
                                            if($num == 0){
                                                echo "It is not a Prime Number!";
                                            }else{
                                                $flag = 1;
                                                for($i = 2; $i <= $num / 2; $i += 1){
                                                    if($num % $i == 0){
                                                        echo "It is not a Prime Number!";
                                                        $flag = 0;
                                                        break;
                                                    }
                                                }
                                                if($flag == 1) echo "It is a Prime Number!";
                                            }
                                        break;
                                        
                                        case 'palin':
                                            if($num >= 0 && $num <= 9) echo "It is a Palindromic Number!";
                                            else{
                                                $a = $num;
                                                $val = 0;
                                                while($a > 0){
                                                    $d = fmod($a, 10); // For getting the remainder.
                                                    $val = ($val * 10) + $d;
                                                    $a = intdiv($a, 10); // For integer division.
                                                }
                                                if($val == $num) echo "It is a Palindromic Number!";
                                                else echo "It is not a Palindromic Number!";
                                            }
                                        break;
    
                                        case 'perfect':
                                            if($num != 0){
                                                $sum = 0;
                                                for($i = 1; $i <= $num / 2; $i += 1)
                                                    if($num % $i == 0)
                                                        $sum += $i;
                                                if($sum == $num) echo "It is a Perfect Number!";
                                                else echo "It is not a Perfect Number!";
                                            }else{
                                                echo "It is not a Perfect Number!";
                                            }
                                        break;
    
                                        case 'armst':
                                            $a = $num;
                                            $val = 0;
                                            while($a > 0){
                                                $d = fmod($a, 10); // For getting the remainder.
                                                $val = $val + pow($d, strlen((string)$num));
                                                $a = intdiv($a, 10); // For integer division.
                                            }
                                            if($val == $num) echo "It is an Armstrong Number!";
                                            else echo "It is not an Armstrong Number!";
                                        break;
    
                                        case 'auto':
                                            if(strlen((string)$num) == 1){
                                                $a = pow($num, 2);
                                                $d = fmod($a, 10);
                                                if($d == $num) echo "It is an Automorphic Number!";
                                                else echo "It is not an Automorphic Number!";
                                            }else echo "You should enter a single digit!";
                                        break;
    
                                    }
                                }else echo "Please enter positive number!";
                            }else{
                                echo "No number is given!";
                            }
                        ?>" readonly>
                </div>

                <button class="check">Check!</button>
            </form>
        </div>
    </div>
</body>
</html>