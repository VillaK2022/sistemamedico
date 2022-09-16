
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {

            $n_hc  = $_POST['n_hc']; 
            $ap_p  = $_POST['ap_p']; 
            $ap_m  = $_POST['ap_m']; 
            $nombre  = $_POST['name']; 
            $cedula = $_POST['ci'];
            $telefono = $_POST['tf'];
            $fecha_n  = $_POST['fecha_n']; 
            $edad  = $_POST['edad']; 
            $ocu_p  = $_POST['ocu_p']; 
            $estado_c  = $_POST['estado_c']; 
            $reci  = $_POST['reci']; 

            $query = mysqli_query($mysqli, "INSERT INTO paciente(n_hc,cedula_p,apellido_m,apellido_p,nombre,edad,f_nacimiento,ocupacion,estado_civil,residencia,telefono) 
                                            VALUES('$n_hc','$cedula','$ap_m','$ap_p','$nombre','$edad','$fecha_n','$ocu_p','$estado_c','$reci','$telefono')")
                                            or die('error '.mysqli_error($mysqli));    
            if ($query) {
         
                header("location: ../../main.php?module=paciente&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
       
        if (isset($_POST['Guardar'])) {
           {
        
                $ap_p  = $_POST['ap_p']; 
                $ap_m  = $_POST['ap_m']; 
                $nombre  = $_POST['name']; 
                $cedula = $_POST['ci'];
                $telefono = $_POST['tf'];
                $fecha_n  = $_POST['fecha_n']; 
                $edad  = $_POST['edad']; 
                $ocu_p  = $_POST['ocu_p']; 
                $estado_c  = $_POST['estado_c']; 
                $reci  = $_POST['reci']; 
                $id = $_POST['id_paciente'];

                $query = mysqli_query($mysqli, "UPDATE
                                                 paciente
                                                 SET 
                                                cedula_p = '$cedula',
                                                apellido_m = '$ap_m',
                                                apellido_p = '$ap_p',
                                                nombre = '$nombre',
                                                edad = '$edad ',
                                                f_nacimiento = '$fecha_n ',
                                                ocupacion = '$ocu_p',
                                                estado_civil = '$estado_c',
                                                residencia = '$reci',
                                                telefono = '$telefono'
                                                 WHERE 
                                                 id_paciente='$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=paciente&alert=2");
                }         
            
        }}
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE 
                                            FROM 
                                            paciente
                                             WHERE 
                                             id_paciente='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=paciente&alert=3");
            }
        }
    }       
}       
?>