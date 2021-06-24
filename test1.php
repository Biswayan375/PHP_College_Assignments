<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form method="post" action="#">
		<input type="text" name="text" required>
		<button name="submit" value="submit">Submit</button>
	</form>
	<?php
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(isset($_SESSION["key"])){
				$list = $_SESSION['key'];
				array_push($list, $_POST["text"]);
				$_SESSION['key'] = $list;
			}else{
				$_SESSION["key"] = [];
				$list;
				array_push($list, $_POST["text"]);
				var_dump($list);
				$_SESSION["key"] = $list;
			}
		}
	?>
</body>
</html>