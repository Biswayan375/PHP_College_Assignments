<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="#" method="post">
		<input name="input1" type="text">
		<button name="button1" value="button1">Submit</button>
	</form>
	<form action="#" method="post">
		<button name="destroy" value="destroy">Destroy</button>
	</form>
	<?php
		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["button1"])){
			// echo "Good Morning " . $_POST["input1"];
			if(isset($_SESSION["data"])){
				$userList = $_SESSION["data"];
				array_push($userList, $_POST["input1"]);
				$_SESSION["data"] = $userList;
			}else{
				$userList = [];
				array_push($userList, $_POST["input1"]);
				$_SESSION["data"] = $userList;
			}
			print_r($_SESSION["data"]);
		}
		elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["destroy"])){
			session_destroy();
		}
	?>
</body>
</html>