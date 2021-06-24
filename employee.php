<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Employee Data</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<style type="text/css">
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
        .dataInputSection{
        	display: flex;
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 0px 13px 6px #00000029;
            min-width: 500px;
            max-width: 500px;
            margin-top: 3px;
        }
        #goButton{
        	display: block;
        	margin: auto;
        	background-color: blueviolet;
        	color: white;
        }
	</style>
</head>
<body>
	<div class="container">
		<section class="inputSection">
			<span>How many employees are there?</span>
			<form method="post" action="#">
				<input type="number" name="n" id="n" required>
				<button name="goButton" id="goButton">Go!</button>
			</form>
		</section>

		<section id="dataInputSection" class="dataInputSection">
			<?php
				if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['n'])){
					echo "
					<script>
						document.getElementById('dataInputSection').style.display = 'flex';
					</script>";
					echo "<form method='post' action='#'>";
					echo "<div style='display: flex;width: 500px; overflow-x: auto;'>";
					for($i = 0; $i < $_POST["n"]; $i++){
						echo "<div style='width: min-content; padding: 3px; background-color: whitesmoke; border-radius: 5px; margin: 3px'>";
							echo "<span style='color: blue; font-weight: bold; font-size: 20px; display: block; text-align: center; background-color: blue; color: white; border-top-left-radius: 5px; border-top-right-radius: 5px'>Employee" . $i + 1 . "</span>";
							echo "<span>Employee ID</span>";
							echo "<input type='text' class='dataInput' name='eid" . $i . "' required>";
							echo "<span>Name</span>";
							echo "<input type='text' class='dataInput' name='name" . $i . "' required>";
							echo "<span>Address</span>";
							echo "<input type='text' class='dataInput' name='address" . $i . "' required>";
							echo "<span>City</span>";
							echo "<input type='text' class='dataInput' name='city" . $i . "' required>";
							echo "<span>PIN</span>";
							echo "<input type='number' class='dataInput' name='pin" . $i . "' required>";
							echo "<span>Email</span>";
							echo "<input type='email' class='dataInput' name='email" . $i . "' required>";
							echo "<span>Contact No.</span>";
							echo "<input type='number' class='dataInput' name='number" . $i . "' required minlength='10'>";
						echo "</div>";
					}
					echo "</div>";
					echo "<button style='margin: 3px;' name='dataSubmitButton'>Submit</button>";
					echo "<button style='margin: 3px;' name='dataSubmitButton' type='reset'>Reset</button>";
					echo "</form>";
				}else{
					echo "
					<script>
						document.getElementById('dataInputSection').style.display = 'none';
					</script>";
				}
			?>
		</section>

		<?php
			if($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["n"])){
				$i = 0;
				$dataList = [];
				$arr = [];
				foreach ($_POST as $value) {
					if($i < 7){
						array_push($arr, $value);
						$i++;
					}else{
						array_push($dataList, $arr); 
						$i = 0;
						$arr = [];
						array_push($arr, $value);
						$i++;
					}
				}
				$_SESSION["data"] = $dataList;
				header("Location: ./employeeDataView.php");
				exit;
			}
		?>
	</div>
</body>
</html>