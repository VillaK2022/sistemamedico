
<?php

require_once "config/database.php";
//MD5
$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));

$password =  $_POST['password'];

if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	header("Location: indexx.php?alert=1");
	$active = false;
}
else {

	$query = mysqli_query($mysqli, "SELECT * FROM usuario WHERE username='$username' AND pass='$password'")
									or die('error'.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);
	
	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();

		$active = true;

		$_SESSION['active']    = $active;
		$_SESSION['id_user']   = $data['id_usuario'];
		$_SESSION['username']  = $data['username'];
		$_SESSION['ci']  	   = $data['cedula'];
		$_SESSION['password']  = $data['pass'];
		$_SESSION['permisos'] = $data['permisos'];
		header("Location: main.php?module=start");
	}


	else {
		header("Location: indexx.php?alert=1");
	}
}
?>