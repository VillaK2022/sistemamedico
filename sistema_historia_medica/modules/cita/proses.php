
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
           
            $fecha  = $_POST['fecha']; 
            $motivo  = $_POST['motivo'];
            $paciente = $_POST['paciente'];
            $medico = $_POST['medico'];



            $citas = mysqli_query($mysqli, "SELECT * FROM citas WHERE fecha = '$fecha' ");

            $rows  = mysqli_num_rows($citas);

            echo $rows;

            if ($rows >= 3) {
                header("location: ../../main.php?module=cita&alert=4");
            }else{

                
                $query = mysqli_query($mysqli, "INSERT INTO citas(id_pa_fk,id_doc_fk,fecha,razon) 
                                            VALUES('$paciente','$medico','$fecha','$motivo')")
                                            or die('error '.mysqli_error($mysqli));    
                if ($query) {
             
                    header("location: ../../main.php?module=cita&alert=1");
                } 

            }


              
        }   
    }
    
    elseif ($_GET['act']=='update') {
       
        if (isset($_POST['Guardar'])) {
           {
        
                $fecha  = $_POST['fecha']; 
                $motivo  = $_POST['motivo'];
                $paciente = $_POST['paciente'];
                $medico = $_POST['medico'];
                $id = $_POST['id'];

                $query = mysqli_query($mysqli, "UPDATE
                                                 citas
                                                 SET 
                                                 id_pa_fk='$paciente',
                                                 id_doc_fk='$medico',     
                                                 fecha='$fecha',
                                                 razon='$motivo'
                                                 
                                                 WHERE 
                                                 id_cita='$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=cita&alert=2");
                }         
            
        }}
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE 
                                            FROM 
                                            citas
                                             WHERE 
                                             id_cita='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=cita&alert=3");
            }
        }
    }       
}       
?>