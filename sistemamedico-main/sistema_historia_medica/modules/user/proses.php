<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {

	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {
	
			$username  = $_POST['username'];
			$password  = $_POST['pass'];
			$cedula  = $_POST['ci'];
			$permisos_acceso = $_POST['permisos'];

			

			$query = mysqli_query($mysqli, "INSERT INTO usuario(username,pass,permisos,cedula)
                                    VALUES('$username','$password','$permisos_acceso','$cedula')")
                                    or die('error: '.mysqli_error($mysqli));    

			if ($query) {
                header("location: ../../main.php?module=user&alert=1");
            }

	}
}
	elseif ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['id_usuario'])) {

				$username  = $_POST['username'];
				$password  = $_POST['pass'];
				$permisos_acceso = $_POST['permisos'];
				$id_user = $_POST['id_usuario'];


				$query = mysqli_query($mysqli, "UPDATE usuario SET 
																	username 	= '$username',

                													pass = '$password',

                													permisos = '$permisos_acceso'
                                                              WHERE id_usuario 	= '$id_user'")
                                                or die('error: '.mysqli_error($mysqli));

				if ($query) {
	                header("location: ../../main.php?module=user&alert=2");
	            }					
			}
		}
	}


	elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
      		$busqueda =  mysqli_query($mysqli, "SELECT cedula FROM usuario WHERE id_usuario = '$codigo'") or die('error '.mysqli_error($mysqli));

      		$row1 = mysqli_fetch_assoc($busqueda); 
                
            $resul = $row1['cedula'];

            $coincidencia =  mysqli_query($mysqli, "SELECT cedula FROM medico WHERE cedula = '$resul'") or die('error '.mysqli_error($mysqli));

      	
            $count = mysqli_num_rows($coincidencia);


            $coincidencia2 =  mysqli_query($mysqli, "SELECT cedula FROM enfermera WHERE cedula = '$resul'") or die('error '.mysqli_error($mysqli));

      	
            $count2 = mysqli_num_rows($coincidencia2);

            echo $count;

            if ($count == 1) {

        	  $query = mysqli_query($mysqli, "DELETE 
                                            FROM 
                                            usuario
                                             WHERE 
                                             id_usuario='$codigo'")
                                            or die('error '.mysqli_error($mysqli));

                $query2 = mysqli_query($mysqli, "DELETE 
                                            FROM 
                                            medico
                                             WHERE 
                                             cedula='$resul'")
                                            or die('error '.mysqli_error($mysqli));


	            if ($query) {
	     
	                header("location: ../../main.php?module=user&alert=3");
	            }
            } else if ($count2 == 1) {
            	$query = mysqli_query($mysqli, "DELETE 
                                            FROM 
                                            usuario
                                             WHERE 
                                             id_usuario='$codigo'")
                                            or die('error '.mysqli_error($mysqli));

                $query2 = mysqli_query($mysqli, "DELETE 
                                            FROM 
                                            enfermera
                                             WHERE 
                                             cedula='$resul'")
                                            or die('error '.mysqli_error($mysqli));


	            if ($query) {
	     
	                header("location: ../../main.php?module=user&alert=3");
	            }
            }else{

            	$query = mysqli_query($mysqli, "DELETE 
                                            FROM 
                                            usuario
                                             WHERE 
                                             id_usuario='$codigo'")
                                            or die('error '.mysqli_error($mysqli));
                header("location: ../../main.php?module=user&alert=3");

            }
          
        }
    }      		
}		
?>