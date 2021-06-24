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
    		display: flex;
    		justify-content: center;
    		align-items: center;
    		flex-direction: column;
    		height: 100vh;
    		width: 100vw;
    		background-color: #e2e2e2;
    	}
    	input{
		    font-size: 16px;
		    margin: 2px;
		    border: none;
		    padding: 5px;
		    border-radius: 7px;
		    width: 280px;
		}
		input:focus{
		    outline: none
		}
		span{
			color: blueviolet;
			margin: 3px;
		}
		.inputSection form{
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		.matInSection{
			text-align: center;
		}
		#dimensionInputButton{
			padding: 3px;
		    margin-top: 3px;
		    font-size: 16px;
		    background-color: blueviolet;
		    color: white;
		    font-weight: bold;
		    border: none;
		    border-radius: 6px;
		    cursor: pointer;
		    width: 40%;
		}
		#dimensionInputButton:hover{
			background-color: #8a2be2a6;
		}
		#matInButton{
			padding: 3px;
		    margin-top: 3px;
		    font-size: 16px;
		    background-color: blueviolet;
		    color: white;
		    font-weight: bold;
		    border: none;
		    border-radius: 6px;
		    cursor: pointer;
		    width: 40%;
		}
		.opButton{
			padding: 3px;
		    margin-top: 3px;
		    font-size: 16px;
		    background-color: #e91e63;
		    color: white;
		    font-weight: bold;
		    border: none;
		    border-radius: 6px;
			cursor: pointer;
			margin: 3px;
		}
		.opButton:hover{
			background-color: #e91e6382;
		}
		.matIn{
			width: 50px;
		}
		.matInSection{
			display: flex;
			flex-direction: column;
		}
		.matDispSection{
			text-align: center;
		}
		.matBox{
			width: 38px;
			text-align: center;
		}
		.answerSection{
			text-align: center;
		}
    </style>
</head>

<body>
	<div class="container">

		<section id="inputSection" class="inputSection">
			<form action="#" method="post">
				<input style="display: block;" id="dimensionInput" name="dimensionInput" type="number" placeholder="Enter the dimension of the matrix" required max="10" min="2">
				<button id="dimensionInputButton">Go!</button>
			</form>
		</section>

		<section id="matInSection" class="matInSection">
			<form action="#" method="post" id="matInForm">
				<?php
					if(isset($_POST["dimensionInput"])){
						$n = $_POST["dimensionInput"];
						echo "<span>Input data in the first matrix</span>";
						echo "<div>";
						for($i = 0; $i < $n; $i++){
							for($j = 0; $j < $n; $j++){
								echo "<input class='matIn' type='number' name='mat1In" . $i . $j . "'" . " required>";
							}
							echo "<br>";
						}
						echo "</div>";
						echo "<span>Input data in the second matrix</span>";
						echo "<div>";
						for($i = 0; $i < $n; $i++){
							for($j = 0; $j < $n; $j++)
								echo "<input class='matIn' type='number' name='mat2In" . $i . $j . "'" . " required>";
							echo "<br>";
						}
						echo "</div>";
						echo '<button id="matInButton" type="submit">Create!</button>';
					}
				?>
			</form>
		</section>

		<section class="matDispSection" id="matDispSection">
			<?php
				
				if($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["dimensionInput"])){
					
					echo "<script>
						let in = document.getElementById('matInFormSection');

						in.style.display = 'block';
					</script>";
					echo "<span style='display: block'>Your matrices are</span>";
					echo "<div style='display: flex;'>";
					if(isset($_SESSION['mat1']) && isset($_SESSION['mat2']) && isset($_SESSION['n'])){
						$mat1 = $_SESSION['mat1'];
						$mat2 = $_SESSION['mat2'];
						$matDim = $_SESSION['n'];
						// session_destroy();
					}else{
						$n = sizeof($_POST) / 2;
						$matDim = sqrt($n);
						for($i = 0, $k = 0; $i < $matDim; $i++){
							for($j = 0; $j < $matDim; $j++){
								$str = "mat1In" . $i . $j;
								$mat1[$i][$j] = $_POST[$str];
								$k++;
							}
						}
	
						for($i = 0; $i < $matDim; $i++){
							for($j = 0; $j < $matDim; $j++){
								$str = "mat2In" . $i . $j;
								$mat2[$i][$j] = $_POST[$str];
								$k++;
							}
						}
						$_SESSION["mat1"] = $mat1;
						$_SESSION["mat2"] = $mat2;
						$_SESSION["n"] = $matDim;
					}
					echo "<div>";
					for($i = 0; $i < $matDim; $i++){
						$rowSum = 0;
						for($j = 0; $j < $matDim; $j++){
							echo "<input class='matBox' value='" . $mat1[$i][$j] . "'" . " readonly>";
							$rowSum += $mat1[$i][$j];
						}
						echo "<div style='width: 38px; display: inline-block'><span style='color: green;'>=" . $rowSum . "</span></div>" . "<br>";
					}

					for($j = 0; $j < $matDim; $j++){
						$colSum = 0;
						for($i = 0; $i < $matDim; $i++){
							$colSum += $mat1[$i][$j];
						}
						echo "<div style='display: inline-block; width: 38px; padding: 5px'><span style='color: green;'>=" . $colSum . "</span></div>";
					}
					echo "<div style='display: inline-block; width: 38px'><span></span></div>";
					echo "</div>";
					echo "<div style='display: flex; align-items: center;'><span>&nbsp&nbsp&nbspand&nbsp&nbsp&nbsp</span></div>";
					echo "<div>";
					for($i = 0; $i < $matDim; $i++){
						$rowSum = 0;
						for($j = 0; $j < $matDim; $j++){
							echo "<input class='matBox' value='" . $mat2[$i][$j] . "'" . " readonly>";
							$rowSum += $mat2[$i][$j];
						}
						echo "<div style='width: 38px; display: inline-block'><span style='color: green;'>=" . $rowSum . "</span></div>" . "<br>";
					}

					for($j = 0; $j < $matDim; $j++){
						$colSum = 0;
						for($i = 0; $i < $matDim; $i++){
							$colSum += $mat2[$i][$j];
						}
						echo "<div style='display: inline-block; width: 38px; padding: 5px'><span style='color: green;'>=" . $colSum . "</span></div>";
					}
					echo "<div style='display: inline-block; width: 38px'><span></span></div>";
					echo "</div>";
					echo "</div>";

				}else{
					if(isset($_SESSION))
						session_destroy();
				}

			?>
		</section>

		<section class="answerSection">

				<?php
					if($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["dimensionInput"])){
						echo "<form method='post' action='#'>";
						echo "<button class='opButton' name='sumButton' type='submit' value='sumButton'>Add them</button>";
						echo "<button class='opButton' name='mulButton' type='submit' value='mulButton'>Multiply them</button>";
						echo "</form>";
					}
					if($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST["sumButton"]) || isset($_POST["mulButton"]))){
						if(isset($_POST["sumButton"])){
							
							for($i = 0; $i < $matDim; $i++)
								for($j = 0; $j < $matDim; $j++)
									$sum[$i][$j] = $mat1[$i][$j] + $mat2[$i][$j];
							echo "<span>The result of summation is</span><br>";
							for($i = 0; $i < $matDim; $i++){
								for($j = 0; $j < $matDim; $j++)
									echo "<input style='color: green; background-color: #00800029' class='matBox' value='" . $sum[$i][$j] . "'" . " readonly>";
								echo "<br>";
							}

						}else{
							for($i = 0; $i < $matDim; $i++)
								for($j = 0; $j < $matDim; $j++)
									$mul[$i][$j] = 0;
							for($i = 0; $i < $matDim; $i++)
								for($j = 0; $j < $matDim; $j++)
									for($k = 0; $k < $matDim; $k++)
										$mul[$i][$j] += $mat1[$i][$k] * $mat2[$k][$j];
							echo "<span>The result of multiplication is</span><br>";
							for($i = 0; $i < $matDim; $i++){
								for($j = 0; $j < $matDim; $j++)
									echo "<input style='color: green; background-color: #00800029' class='matBox' value='" . $mul[$i][$j] . "'" . " readonly>";
								echo "<br>";
							}
						}
					}
				?>

		</section>

	</div>
</body>
</html>