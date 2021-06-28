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
		.buttonPanel{
			min-width: 400px;
			max-width: 400px;
			text-align: center;
		}
		.buttonAnsViewPanel{
			min-width: 600px;
			max-width: 600px;
		}
		.userInteractionPanel{
			min-width: 600px;
			max-width: 600px;
			display: flex;
			justify-content: center;
			flex-direction: column;
			border: 1px solid;
			border-radius: 7px;
			padding: 5px;
			margin-top: 5px;
		}
		.userInteractionForm{
			display: flex;
			flex-direction: column;
			margin: auto;
			width: 50%;
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
						document.getElementById('inputSection').style.display = 'block';
					</script>";

					if(isset($_SESSION["data"])){
						session_destroy();
						session_start();
					}
					
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
						document.getElementById('inputSection').style.display = 'none';
					</script>";
				}
			?>
		</section>

		<section id="displaySection" class="displaySection">
			<span style="display: block; text-align: center">Formed array is</span>
			<?php
				if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createButton"]) || (isset($_SESSION["data"]))){
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
						 if(!isset($_SESSION["data"])) $_SESSION['data'] = $dataList;
						 else $dataList = $_SESSION['data'];
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
			<form method="post" action="#">
				<?php
					if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createButton"]) || (isset($_SESSION["data"]))){
						echo "<button style='margin-top: 3px' name='valueButton' value='valueButton'>Print values</button>";
						echo "<button style='margin-top: 3px' name='dupValues' value='dupValues'>Remove duplicate values</button>";
						echo "<button style='margin-top: 3px' name='sortDesc' value='sortDesc'>Sort by key(descending)</button>";
					}
				?>
			</form>
		</section>

		<section class="buttonAnsViewPanel" id="buttonAnsViewPanel">
			<?php
				if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["valueButton"])){
					echo "
					<script>
						document.getElementById('buttonAnsViewPanel').style.display = 'block';
					</script>";

					echo "<span style='display: block; text-align: center;'>The values are</span>";
					echo "<div style='display: flex; max-width: 600px; overflow-x: auto'>";
					foreach($dataList as $k => $v){
						echo "<input style='width: 180px;' value='" . $v . "' readonly>";
					}
					echo "</div>";
				}
				elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dupValues"])){
					$dataList = $_SESSION["data"];
					$dataList = array_unique($dataList);
					echo "<span style='display: block; text-align: center;'>After removing duplicate values</span>";
					echo "<div style='display: flex; max-width: 600px; overflow-x: auto'>";
						foreach($dataList as $k => $v){
							echo "<div style='text-align: center'>";
								echo "<span style='display: block'>Key</span>";
								echo "<input style='width: 180px' value='" . $k . "' readonly>";
								echo "<span style='display: block'>value</span>";
								echo "<input style='width: 180px' value='" . $v . "' readonly>";
							echo "</div>";
						}
					echo "</div>";
				}
				elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sortDesc"])){
					$dataList = $_SESSION["data"];
					krsort($dataList);
					echo "<span style='display: block; text-align: center;'>After Sorting the array in descending order by keys</span>";
					echo "<div style='display: flex; max-width: 600px; overflow-x: auto'>";
						foreach($dataList as $k => $v){
							echo "<div style='text-align: center'>";
								echo "<span>Key</span>";
								echo "<input style='width: 180px' value='" . $k . "' readonly>";
								echo "<span>value</span>";
								echo "<input style='width: 180px' value='" . $v . "' readonly>";
							echo "</div>";
						}
					echo "</div>";
				}
				else
				echo "
				<script>
					document.getElementById('buttonAnsViewPanel').style.display = 'none';
				</script>";
			?>
		</section>

		<section class="userInteractionPanel" id="userInteractionPanel">
			<?php
				if(isset($_SESSION["data"])){
					echo "
					<script>
						document.getElementById('userInteractionPanel').style.display = 'block';
					</script>";
					echo "<div class='userInteractionForm'>";
						echo "<form method='post' action='#'>";
							echo "<span>Split the array from key</span>";
							echo "<input name='split' type='text' required>";
							echo "<button>Split</button>";
						echo "</form>";
						if(isset($_POST["split"])){
							$flag = 0;
							$i = 0;
							$dataList = $_SESSION["data"];
							foreach($dataList as $k => $v){
								if($flag == 0){
									$arr1[$k] = $v;
									$i++;
								}
								else $arr2[$k] = $v;
								if($k == $_POST["split"]){
									$flag = 1;
								}
							}
							if($flag == 0){
								echo "<span style='color: red'>Key not found</span>";
							}else{
								echo "<span>First array is</span>";
								foreach($arr1 as $k => $v){
									echo "$k => $v&nbsp&nbsp";
								}
								if($flag == 1 && $i != sizeof($dataList)){
									echo "<span>Second array is</span>";
									foreach($arr2 as $k => $v){
										echo "$k => $v&nbsp&nbsp";
									}
								}
							}
						}
					echo "</div>";

					echo "<div class='userInteractionForm'>";
						echo "<form method='post' action='#'>";
							echo "<br><span>Show the value of key</span>";
							echo "<input name='valueOfKey' type='text' required>";
							echo "<button>Show</button>";
						echo "</form>";
						if(isset($_POST['valueOfKey'])){
							$dataList = $_SESSION["data"];
							if(isset($dataList[$_POST['valueOfKey']])) echo "Value of key " . $_POST['valueOfKey'] . " is " . $dataList[$_POST['valueOfKey']];
							else echo "<span style='color: red'>Key not found</span>";
						}
					echo "</div>";

					echo "<div class='userInteractionForm'>";
						echo "<form method='post' action='#'>";
							echo "<br><span>Show slice of the array from key</span>";
							echo "<input name='sliceKey' required>";
							echo "<button>Show slice</button>";
						echo "</form>";
						if(isset($_POST["sliceKey"])){
							$dataList = $_SESSION["data"];
							$key = $_POST["sliceKey"];
							$flag = 0;
							$i = 0;
							foreach($dataList as $k => $v){
								if($k == $key) $flag = 1;
								if($flag == 1)
									$arr[$k] = $v;
							}
							if($flag == 1){
								echo "<span style='display: block'>The slice of the array from " . $_POST["sliceKey"] . " is</span>";
								foreach($arr as $k => $v){
									echo "$k => $v&nbsp&nbsp";
								}
							}else{
								echo "<span style='color: red;'>Key not found!</span>";
							}
						}
					echo "</div>";

					echo "<div style='width: 100%; text-align: center' class='userInteractionForm'>";
						echo "<form method='post' action='#'>";
							echo "<br><span style='display: block;'>Enter the length of replacement array</span>";
							echo "<input type='number' name='rArrayLen' required min='1'>";
							echo "<span style='display: block;'>Enter the key from which replacement should start</span>";
							echo "<input name='rArrayStart' type='text' required>";

							echo "<button name='rArrayButton' value='rArrayButton'>Go!</button>";
						echo "</form>";
						if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rArrayButton"])){
							$dataList = $_SESSION["data"];
							$_SESSION['rKey'] = $_POST["rArrayStart"];
							$flag = 0;
							foreach($dataList as $k => $v){
								if($k == $_POST["rArrayStart"]) $flag = 1;
							}
							if($flag == 0){
								echo "<span style='display: block; color: red'>Key not found!</span>";
							}
							else{
								echo "<form method='post' action='#'>";
								echo "<div class='inputCards'>";
								for ($i=0; $i < $_POST["rArrayLen"]; $i++) {
									echo "<div class='card'>";
										echo "<label style='display: block' for='rkey" . $i . "'>Enter the key</label>";
										echo "<input type='text' id='rkey" . $i . "' name='rkey" . $i . "' required>";
										echo "<label style='display: block' for='rvalue" . $i . "'>Enter the value</label>";
										echo "<input type='text' id='rvalue" . $i . "' name='rvalue" . $i . "' required>";
									echo "</div>";
								}
								echo "</div>";
								echo "<button name='rArrayCreateButton' value='rArrayCreateButton'>Create</button>";
								echo "</form>";
							}
						}

						if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rArrayCreateButton'])){
							$data = $_POST;
							array_pop($data);
							$i = 0;
							 foreach ($data as $value) {
								 if($i % 2 == 0){
									 $str = $value;
									 $rDataList[$str] = 0;
								 }else{
									 $rDataList[$str] = $value;
								 }
								 $i++;
							}
							$dataList = $_SESSION["data"];
							$rKey = $_SESSION["rKey"];
							$newDataList = [];
							foreach($dataList as $k => $v){
								if($k == $rKey) break;
								$newDataList[$k] = $v;
							}
							$mergedArray = array_merge($newDataList, $rDataList);
							echo "<span style='display: block'>Newly formed array is</span>";
							foreach($mergedArray as $k => $v){
								echo "$k=>$v&nbsp&nbsp";
							}
						}

					echo "</div>";
				}
				else{
					echo "
					<script>
						document.getElementById('userInteractionPanel').style.display = 'none';
					</script>";
				}
			?>
		</section>
	</div>
</body>
</html>