<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Associative Array</title>
	<style type="text/css">
		*{
			font-size: 19px;
			font-family: sans-serif;
		}
		.container{
			display: flex;
			height: 100vh;
			width: 100vw;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}
		.formDiv{
			display: flex;
			flex-direction: column;
		}
		.goButton{
			width: 40%;
			margin: auto;
			margin-top: 3px;
			cursor: pointer;
		}
		.inputSection{
			margin-top: 5px;
			border: 1px solid;
			padding: 8px;
			border-radius: 8px;
		}
		.inputCards{
			display: flex;
			min-width: 500px;
			max-width: 500px;
			overflow-x: auto;
			padding: 5px;
		}
		.card{
			border: 1px solid;
			border-radius: 5px;
			padding: 5px;
			margin: 3px;
		}
		.displaySection{
			border: 1px solid;
			border-radius: 5px;
			padding: 5px;
		}
		.displayView{
			display: flex;
			min-width: 600px;
			max-width: 600px;
			overflow-x: auto;
			padding: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<form method="post" action="#">
			<div class="formDiv">
				<label for="n">Enter the number of elements</label>
				<input type="number" name="n" id="n" required>
				<button class="goButton" name="goButton" value="goButton">Go!</button>
			</div>
		</form>

		<section class="inputSection" id="inputSection">
			<?php
				if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["goButton"])){
					echo "
					<script>
						document.getElementById('inputSection').style.visibility = 'block';
					</script>";
					
						echo "<form method='post' action='#'>";
							echo "<div class='inputCards'>";
							for ($i=0; $i < $_POST["n"]; $i++) {
								echo "<div class='card'>";
									echo "<label style='display: block' for='key" . $i . "'>Enter the key</label>";
									echo "<input type='text' id='key" . $i . "' name='key" . $i . "' required>";
									echo "<label style='display: block' for='value" . $i . "'>Enter the value</label>";
									echo "<input type='text' id='value" . $i . "' name='value" . $i . "' required>";
								echo "</div>";
							}
							echo "</div>";
							echo "<button name='createButton' value='createButton'>Create</button>";
						echo "</form>";
					
				}else{
					echo "
					<script>
						document.getElementById('inputSection').style.visibility = 'hidden';
					</script>";
				}
			?>
		</section>

		<span>Formed array is</span>

		<section class="displaySection">
			<?php
				if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createButton"])){
					echo "
					<script>
						document.getElementById('displaySection').style.visibility = 'block';
					</script>";
					$data = $_POST;
					array_pop($data);
					echo "<div class='displayView'>";
						$i = 0;
						 foreach ($data as $value) {
						 	if($i % 2 == 0){
						 		$str = $value;
						 		$dataList[$str] = 0;
						 	}else{
						 		$dataList[$str] = $value;
						 	}
						 	$i++;
						 }
						 $_SESSION['data'] = $dataList;
						 foreach ($_SESSION["data"] as $key => $value) {
						 	echo "<div style='display: flex; flex-direction: column; border: 1px solid; border-radius: 7px; margin: 3px; padding: 7px; text-align: center'>";
						 		echo "<span>Key</span>";
						 		echo "<input style='text-align: center; margin: auto' value='" . $key . "' readonly>";
						 		echo "<span>Value</span>";
						 		echo "<input style='text-align: center; margin: auto' value='" . $value . "' readonly>";
						 	echo "</div>";
						 }
					echo "</div>";
				}else{
					echo "
					<script>
						document.getElementById('displaySection').style.visibility = 'hidden';
					</script>";
				}
			?>
		</section>

		<section class="buttonPanel" id="buttonPanel">
			<form style="display: grid; grid-template-columns: repeat(4, 1fr);" method="post" action="#">
				<?php
					if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createButton"])){
						echo "<button style='margin-top: 3px' name='valueButton' value='valueButton'>Print values</button>";
						echo "<button style='margin-top: 3px' name='keyButton' value='keyButton'>Print keys</button>";
					}
				?>
			</form>
		</section>
	</div>
</body>
</html>