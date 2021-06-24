<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test</title>
</head>
<body>
	<form method="post" action="#">
		<input type="text" name="name" placeholder="name">
		<input type="number" name="roll" placeholder="roll">
		<button>Submit</button>
	</form>
	<?php
		function cleanData(&$str){
			$str = preg_replace("/\t/", "\\t", $str);
			$str = preg_replace("/\r?\n/", "\\n", $str);
			if(strstr($str, '""')) $str = '"' . str_replace('"', '""', $str) . '"';
		}

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$data = [
				["name" => $_POST["name"], "roll" => $_POST['roll']]
			];

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
</body>
</html>