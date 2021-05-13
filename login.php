<!DOCTYPE html>
<html>
<head>
	<center><title>LOGIN</title>
</head>
<body>
	<div id="main">
		<h2>LOGIN</h2>
	</div>
	<form method="POST">
		Username
		<div class="text">
			<input type="text" name="admin" autocomplete="off"required>
		</div>
		Password
		<div class="text">
			<input type="password" name="password" required>
		</div>
		<div>
		<input type="submit" name="submit" class="sub">
		</div>
	</form>
	<br>
</body>
</html>

<?php
if (isset($_POST['submit'])){
	$un=$_POST['admin'];
	$pw=$_POST['password'];

	if($un=='admin' && $pw=='password'){
			header("location: admin/index.php");
			exit();
		}
		else
			echo "Invalid";
	}
		

?>
