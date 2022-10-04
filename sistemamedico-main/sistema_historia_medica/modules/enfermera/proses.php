
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

            $query = mysqli_query($mysqli, "INSERT INTO enfermera(nombre,apellido,telefono,cedula) 
                                            VALUES('$nombre','$apellido','$telefono','$cedula')")
                                            or die('error '.mysqli_error($mysqli));    
            if ($query) {
         
                header("location: ../../main.php?module=enf&alert=1");
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
                $id = $_POST['id_enfermera'];

                $query = mysqli_query($mysqli, "UPDATE
                                                 enfermera
                                                 SET 
                                                 nombre='$nombre',
                                                 apellido='$apellido',    
                                                 telefono='$telefono',
                                                 cedula='$cedula'
                                                 WHERE 
                                                 id_enfermera='$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=enf&alert=2");
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
                                                enfermera
                                                 WHERE 
                                                 id_enfermera='$codigo'")
                                                or die('error '.mysqli_error($mysqli));


                if ($query) {
         
                    header("location: ../../main.php?module=enf&alert=3");
                }
            }
        }
    }       
}       
?>