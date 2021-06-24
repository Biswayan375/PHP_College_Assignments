<?php
    session_start();
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <style>
        *{
            font-family: 'sans-serif', Poppins;
            margin: 0;
            padding: 0;
        }
        .container{
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #e2e2e2;
        }
        input{
            font-size: 16px;
            margin: 2px;
            border: none;
            padding: 5px;
            border-radius: 7px;
            width: 180px;
            background-color: #e2e2e2;
        }
        input:focus{
            outline: none;
        }
        span{
            color: blueviolet;
            margin: 3px;
        }
        button{
        	padding: 7px;
        	margin-top: 3px;
        	font-size: 16px;
        	font-weight: bold;
        	border-radius: 7px;
        	border: none;
        	cursor: pointer;
        }
        .userPanel button{
            width: fit-content;
            background-color: rgb(205 0 170);
            color: white;
            display: inline-block;
            margin: 3px;
        }
        .userPanel button:hover{
            background-color: rgb(205 0 170 / 42%);;
        }

        #goButton{
        	background-color: #3f51b5;
        	color: white;
        	width: 40%;
        }
        #createButton{
        	background-color: #14aa02;
        	color: white;
        	width: 40%;
        }
        #goButton:hover{
        	background-color: #3f51b5ab;
        }
        #createButton:hover{
        	background-color: #14aa0291;
        }
        #searchSubmit{
            background-color: #a5a5a5;
        }
        #searchSubmit:hover{
            background-color: #a5a5a578;
        }
        .inputSection{
            display: flex;
            flex-direction: column;
            text-align: center;
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 0px 13px 6px #00000029;
            min-width: 300px;
            max-width: 300px;
        }
        .displaySection{
        	display: flex;
            flex-direction: column;
            text-align: center;
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 0px 13px 6px #00000029;
            min-width: 300px;
            max-width: 300px;
            margin-top: 5px;
        }
        .inputBoxesDiv{
        	display: flex;
        	width: 100%;
        	overflow-x: auto;
        }
        .dynBox{
        	width: 50px;
        }
        .listDiv{
        	display: flex;
        	width: 100%;
        	overflow-x: auto;
        }
        .listItem{
        	width: 50px;
        	text-align: center;
        	background-color: #00800073;
		    color: white;
		    font-weight: bold;
        }
        .userPanel{
            text-align: center;
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 0px 13px 6px #00000029;
            min-width: 300px;
            max-width: 300px;
            margin-top: 10px;
        }
        .searchPanel{
            text-align: center;
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 0px 13px 6px #00000029;
            min-width: 300px;
            max-width: 300px;
            margin-top: 3px;
        }
        .answerPanel{
            text-align: center;
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 0px 13px 6px #00000029;
            min-width: 300px;
            max-width: 300px;
            margin-top: 3px;
        }
    </style>
</head>
<body>
	<div class="container">
		
		<section class="inputSection">
			<form action="#" method="post">
                <label for="N">
                    <span>Enter the number of total elements</span>
                </label>
                <input style="display: block; margin: auto;" id="N" name="N" type="number" min="1" required>

                <button id="goButton" name="goButton" value="goButton">Go!</button>
            </form>
            <?php
            	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["N"])){
            		if(isset($_SESSION["list"])) session_destroy();
            		echo "<form method='post' action='#'>";
	            		$n = $_POST["N"];
	            		echo "<span style='display: block; border-bottom: 1px solid'>Enter the numbers</span>";
	            		echo "<div class='inputBoxesDiv'>";
	            			for($i = 0; $i < $n; $i++){
	            				echo "<input class='dynBox' type='number' name='dynBox" . $i . "' required>";
	            			}
	            		echo "</div>";
	            		echo "<button type='submit' name='createButton' id='createButton' value='createButton'>Create!</button>";
	            	echo "</form>";

            	}
            ?>
		</section>

        <section style="display: flex; justify-content: space-evenly; min-width: 660px; max-height: 660px; align-items: center;">
        
    		<section style="display: none;" class="displaySection" id="displaySection">
    			<?php
    				if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createButton"]) && !isset($_POST["N"])){
    					echo "<script>
    						document.getElementById('displaySection').style.display = 'flex';
    					</script>";
    					echo "<span style='display: block; border-bottom: 1px solid'>The numbers are</span>";
    					$list = $_POST;
    					array_pop($list);
    					$_SESSION["list"] = $list;

    					echo "<div class='listDiv'>";
    						foreach ($list as $value) {
    							echo "<input class='listItem' value='" . $value . "' readonly>";
    						}
    					echo "</div>";
    				}elseif(isset($_SESSION["list"]) && !isset($_POST["N"])){
                        echo "<script>
                            document.getElementById('displaySection').style.display = 'flex';
                        </script>";
                        echo "<span style='display: block; border-bottom: 1px solid'>The numbers are</span>";
                        $list = $_SESSION["list"];
                        echo "<div class='listDiv'>";
                            foreach ($list as $value) {
                                echo "<input class='listItem' value='" . $value . "' readonly>";
                            }
                        echo "</div>";
                    }else{
    					echo "<script>
    						document.getElementById('displaySection').style.display = 'none';
    					</script>";
    				}
    			?>
    		</section>

            <section class="searchPanel" id="searchPanel">
                <?php
                    if(isset($_SESSION["list"]) && !isset($_POST["N"])){
                        echo "<script>
                            document.getElementById('searchPanel').style.display = 'block';
                        </script>";
                        echo "<form method='post' action='#'>";

                            echo "<input name='searchKey' type='number' required>";
                            echo "<button name='searchSubmit' value='searchSubmit' id='searchSubmit'>Search</button>";

                        echo "</form>";

                        echo "<div>";
                            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["searchSubmit"])){
                                $list = $_SESSION["list"];
                                $result = array_search($_POST["searchKey"], $list);
                                if($result != false){
                                    $result = substr($result, -1);
                                    echo "<span style='font-weight: bold; color: green'>First occurence of " . $_POST["searchKey"] . " at index " . $result . "</span>";
                                }else echo "<span style='color: red; font-weight: bold'>" . $_POST["searchKey"] . " Not found!</span>";
                            }
                        echo "</div>";

                    }else{
                        echo "<script>
                            document.getElementById('searchPanel').style.display = 'none';
                        </script>";
                    }
                ?>
            </section>

        </section>

		<section class="userPanel" id="userPanel">
			<?php
				if((isset($_SESSION["list"]) || isset($_POST["createButton"])) && !isset($_POST["N"])){
					echo "<script>
						document.getElementById('userPanel').style.display = 'block';
					</script>";
                    echo "<form method='post' action='#'>";
                        echo "<button id='sumButton' name='sumButton' value='sumButton'>Sum of all</button>";
    					echo "<button id='avgButton' name='avgButton' value='avgButton'>Average of odds</button>";
    					echo "<button name='maxButton' id='maxButton' value='maxButton'>Maximum of all</button>";
    					echo "<button name='minButton' id='minButton' value='minButton'>Minimum of evens</button>";
    					echo "<button name='descButton' id='descButton' value='descButton'>Sort in descending</button>";
    					echo "<button name='revButton' value='revButton' id='revButton'>Reverse list</button>";
    					echo "<button name='countButton' id='countButton' value='countButton'>Count frequency of each</button>";
    					echo "<button name='dupButton' value='dupButton' id='dupButton'>Remove duplicates</button>";
                    echo "</form>";
				}else{
					echo "<script>
						document.getElementById('userPanel').style.display = 'none';
					</script>";
				}
			?>
		</section>

        <section id="answerPanel" class="answerPanel">
            
            <?php
                if(isset($_POST["sumButton"])){
                    echo "<script>
                        document.getElementById('answerPanel').style.display = 'block';
                    </script>";
                    $sum = 0;
                    $list = $_SESSION["list"];
                    foreach($list as $value){
                        $sum += $value;
                    }
                    echo "<span>Sum of all the numbers is: " . $sum . "</span>";
                }
                elseif(isset($_POST["avgButton"])){
                    echo "<script>
                        document.getElementById('answerPanel').style.display = 'block';
                    </script>";
                    $sum = 0;
                    $avg = 0;
                    $n = 0;
                    $list = $_SESSION["list"];
                    foreach($list as $value){
                        if($value % 2 != 0){
                            $sum += $value;
                            $n++;
                        }
                    }
                    if($n != 0) $avg = $sum / $n;
                    echo "<span>Average of odd numbers is: " . $avg . "</span>";
                }
                elseif(isset($_POST["maxButton"])){
                    echo "<script>
                        document.getElementById('answerPanel').style.display = 'block';
                    </script>";
                    $list = $_SESSION["list"];
                    echo "<span>Maximum of all numbers is : " . max($list) . "</span>";
                }
                elseif(isset($_POST["minButton"])){
                    echo "<script>
                        document.getElementById('answerPanel').style.display = 'block';
                    </script>";
                    $evens = [];
                    $list = $_SESSION["list"];
                    foreach ($list as $value) {
                        if($value % 2 == 0) array_push($evens, $value);
                    }
                    if(sizeof($evens) != 0) echo "<span>Minimum of even numbers is : " . min($evens) . "</span>";
                    else echo "<span>No even numbers</span>";
                }
                elseif(isset($_POST["descButton"])){
                    echo "<script>
                        document.getElementById('answerPanel').style.display = 'block';
                    </script>";
                    $list = $_SESSION["list"];
                    rsort($list);
                    echo "<span>The list in descending order is</span>";
                    echo "<div style='display: flex; width: 100%; overflow-x: auto;'>";
                    foreach($list as $value) {
                        echo "<input class='listItem' value='" . $value . "' readonly>";
                    }
                    echo "</div>";
                }
                elseif(isset($_POST["revButton"])){
                    echo "<script>
                        document.getElementById('answerPanel').style.display = 'block';
                    </script>";
                    $list = $_SESSION["list"];
                    $list = array_reverse($list);
                    echo "<span>The list in reversed order is</span>";
                    echo "<div style='display: flex; width: 100%; overflow-x: auto;'>";
                    foreach($list as $value) {
                        echo "<input class='listItem' value='" . $value . "' readonly>";
                    }
                    echo "</div>";
                }
                elseif(isset($_POST["countButton"])){
                    echo "<script>
                        document.getElementById('answerPanel').style.display = 'block';
                    </script>";
                    $list = $_SESSION["list"];
                    echo "<div style='display: flex; flex-direction: column; min-height: 100px; max-height: 100px; overflow-y: auto'>";
                    $arr = [];
                    for ($i = 0; $i < sizeof($list); $i++) {
                        $freq = 0;
                        $str1 = "dynBox" . $i;
                        $k = array_search($list[$str1], $arr);
                        echo $k;
                        if($k == false){
                            echo "Hello";
                            for($j = 0; $j < sizeof($list); $j++){
                            $str2 = "dynBox" . $j;
                            if($list[$str1] == $list[$str2])
                                $freq += 1;
                            }
                            array_push($arr, $list[$str1]);
                            echo "<div><span>Frequency of " . $list[$str1] . " is " . $freq . "</span></div>";
                        }
                    }
                    echo "</div>";
                }
                elseif(isset($_POST["dupButton"])){
                    echo "<script>
                        document.getElementById('answerPanel').style.display = 'block';
                    </script>";
                    $list = $_SESSION["list"];
                    $list = array_unique($list);
                    echo "<div style='display: flex; overflow-x: auto'>";

                        foreach($list as $value){
                            echo "<input class='listItem' value='" . $value . "' readonly>";
                        }

                    echo "</div>";
                }
                else
                    echo "<script>
                        document.getElementById('answerPanel').style.display = 'none';
                    </script>";
            ?>

        </section>

	</div>
</body>
</html>