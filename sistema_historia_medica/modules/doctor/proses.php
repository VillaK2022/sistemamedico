
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
           
            $nombre  = $_POST['name']; 
            $apellido  = $_POST['ap'];
            $cedula = $_POST['ci'];
            $telefono = $_POST['tf'];
            $especialidad = $_POST['espe'];
            $ubicacion = $_POST['ubica'];

            $query = mysqli_query($mysqli, "INSERT INTO medico(apellido,nombre_doc,telefono,especialidad,ubicacion,cedula) 
                                            VALUES('$apellido','$nombre','$telefono','$especialidad','$ubicacion','$cedula')")
                                            or die('error '.mysqli_error($mysqli));    
            if ($query) {
         
                header("location: ../../main.php?module=doc&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
       
        if (isset($_POST['Guardar'])) {
           {
        
                $nombre  = $_POST['name']; 
                $apellido  = $_POST['ap'];
                $cedula = $_POST['ci'];
                $telefono = $_POST['tf'];
                $especialidad = $_POST['espe'];
                $ubicacion = $_POST['ubica'];
                $id = $_POST['id_medico'];

                $query = mysqli_query($mysqli, "UPDATE
                                                 medico
                                                 SET 
                                                 apellido='$apellido',
                                                 nombre_doc='$nombre',     
                                                 telefono='$telefono',
                                                 especialidad='$especialidad',
                                                 ubicacion='$ubicacion',
                                                 cedula='$cedula'
                                                 WHERE 
                                                 id_medico='$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=doc&alert=2");
                }         
            
        }}
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];

            $coincidencia =  mysqli_query($mysqli, "SELECT cedula FROM usuario WHERE cedula = '$codigo'") or die('error '.mysqli_error($mysqli));

        
            $count = mysqli_num_rows($coincidencia);

            if ($count == 1) {
                 header("location: ../../main.php?module=doc&alert=4");
            }else{
      
                $query = mysqli_query($mysqli, "DELETE 
                                                FROM 
                                                medico
                                                 WHERE 
                                                 id_medico='$codigo'")
                                                or die('error '.mysqli_error($mysqli));


                if ($query) {
         
                    header("location: ../../main.php?module=doc&alert=3");
                }
            }
        }
    }       
}       
?>