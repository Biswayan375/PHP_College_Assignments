<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Employee data view</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<style type="text/css">
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
        }
        .tableSection{
        	min-width: 600px;
        	max-width: 800px;
        	text-align: center;
        	display: grid;
        	grid-template-columns: repeat(7, 1fr);
        }
        .dataHeader{
        	font-size: 19px;
        	color: green;
        	border-bottom: 1px solid;
        	padding: 3px;
        	margin-bottom: 5px;
        	font-weight: bold;
        }
        .dataCell{
        	font-size: 17px;
        	color: blueviolet;
        	border-bottom: 1px solid;
        	margin-bottom: 5px;
        }
    </style>
</head>
<body>
	<div class="container">
		<section class="tableSection">
			<?php
				echo "<div class='dataHeader'>Employee ID</div>";
				echo "<div class='dataHeader'>Name</div>";
				echo "<div class='dataHeader'>Address</div>";
				echo "<div class='dataHeader'>City</div>";
				echo "<div class='dataHeader'>PIN</div>";
				echo "<div class='dataHeader'>Email</div>";
				echo "<div class='dataHeader'>Contact No.</div>";
				foreach ($_SESSION["data"] as $key => $value) {
					$arr = $value;
					foreach ($arr as $value) {
						echo "<div class='dataCell'>" . $value . "</div>";
					}
				}
			?>
		</section>
		<a href="./employee.php">Back to home</a>
		<form method="post" action="#">
			<button id="excelButton">Export to Excel</button>
		</form>
		<?php
			function cleanData(&$str){
			$str = preg_replace("/\t/", "\\t", $str);
			$str = preg_replace("/\r?\n/", "\\n", $str);
			if(strstr($str, '""')) $str = '"' . str_replace('"', '""', $str) . '"';
			}

			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$data = $_SESSION["data"];

				$fileName = "website_data_" . date('Ymd') . ".xls";

				header("Content-Disposition: attachment; filename=\"$fileName\"");
				header("Content-Type: application/vnd.ms-excel");

				$flag = false;
				foreach ($data as $row) {
					if(!$flag){
						echo implode("\t", array_keys($row)) . "\r\n";
						$flag = true;
					}
					array_walk($row, __NAMESPACE__ . '\cleanData');
					echo implode("\t", array_values($row)) . "\r\n";
				}
				exit;
			}
		?>
	</div>
</body>
</html>