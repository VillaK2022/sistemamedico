<?php 

	require_once "../../config/database.php";

	$cedula = $_POST['ci'];

	$query = mysqli_query($mysqli, "SELECT * FROM paciente WHERE cedula_p='$cedula'")
									or die('error'.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	if ($rows > 0) {

		header("location:../../main.php?module=form_consulta&form=add&id=$cedula");
	}else{

		header("location:../../main.php?module=form_pac&form=add&id=$cedula");
	}

?>