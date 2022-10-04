
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
           
            $paciente  = $_POST['paciente']; 
            $motivo  = $_POST['motivo'];
            $medico = $_POST['medico'];
            $fecha = date("Y/m/d");

            //consulta
            //
            //
            

            $consulta = mysqli_query($mysqli, "SELECT * FROM consulta WHERE fecha_r = '$fecha' AND id_doc_fk = 'medico'");

            $rows  = mysqli_num_rows($citas);

            echo $rows;

            if ($rows >= 5) {
                header("location: ../../main.php?module=cita&alert=4");
            }else{
                $query = mysqli_query($mysqli, "INSERT INTO consulta(motivo,fecha_r,id_doc_fk,id_pa_fk) 
                                            VALUES('$motivo','$fecha','$medico','$paciente')")
                                            or die('error '.mysqli_error($mysqli)); 

                if ($query) {

                //MEDICO_PACIENTE
                //
                

            
                    $verificar = mysqli_query($mysqli, "SELECT * FROM consulta WHERE id_pa_fk='$paciente' AND id_doc_fk='$medico'");
                    $rows  = mysqli_num_rows($verificar);

                    if ($rows <= 1) {
                         $query3 = mysqli_query($mysqli, "INSERT INTO medico_paciente(id_doc_fk,id_pa_fk) 
                                                    VALUES('$medico','$paciente')")
                                                    or die('error '.mysqli_error($mysqli));
                        //echo "se ejecuto la consulta";
                       
                    }else{

                        //echo "se consiguio un valor mayor a 0";
                       
                    }

                     //EXAMEN FISICO

                    $p_a  = $_POST['p_a']; 
                    $temp  = $_POST['temp'];
                    $fr = $_POST['fr'];
                    $fc = $_POST['fc'];
                    $alt  = $_POST['alt']; 
                    $peso  = $_POST['peso'];

                    $query_id = mysqli_query($mysqli, "SELECT n_consulta FROM consulta ORDER BY n_consulta DESC LIMIT 1");

                    $codigo = mysqli_fetch_assoc($query_id);

                    $codigo = $codigo['n_consulta'];


                    $query2 = mysqli_query($mysqli, "INSERT INTO exa_fisico(id_consul_fk,presion,temperatura,f_respira,f_cardiaca,peso,altura) 
                                                    VALUES('$codigo','$p_a','$temp','$fr','$fc','$alt','$peso')")
                                                    or die('error '.mysqli_error($mysqli));

                    if ($query2 ) {
                       header("location: ../../main.php?module=start&alert=1");
                    }
                }  
            }
  
        }   
    }
}  
?>