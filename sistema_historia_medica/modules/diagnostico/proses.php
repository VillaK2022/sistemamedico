
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {

            $id_paciente = $_POST['id_paciente'];
            $fecha = date("Y/m/d");

            //antecedentes
            $pariente  = $_POST['pariente']; 
            $enfermedad  = $_POST['enfermedad'];
            $descri_a = $_POST['descri_a'];

            //enfermedades
            
            $resp  = $_POST['resp']; 
            $gi  = $_POST['gi'];
            $neuro = $_POST['neuro'];
            $hemato  = $_POST['hemato'];
            $aler = $_POST['aler'];


            //habitos
            $alco  = $_POST['alco']; 
            $dro  = $_POST['dro'];
            $taba = $_POST['taba'];
            $sue  = $_POST['sue']; 
            $vs  = $_POST['vs'];
            $al = $_POST['al'];

            //diagnostico
            
            $alco  = $_POST['alco']; 
            $dro  = $_POST['dro'];
            $taba = $_POST['taba'];
            $sue  = $_POST['sue']; 

            //Diagnostico
            
            $esp  = $_POST['esp']; 
            $enf  = $_POST['enf'];
            $tra = $_POST['tra'];
            $n_consulta  = $_POST['n_consulta']; 
            $er  = $_POST['er']; 

            //receta
            
            $medicamento  = $_POST['medicamento']; 
            $presentacion  = $_POST['presentacion'];
            $dosis = $_POST['dosis'];
            $duracion  = $_POST['duracion'];
            $cantidad = $_POST['cantidad'];
            $empleo  = $_POST['empleo']; 
            
            
            //antecedentes

            
            $antecedentes = mysqli_query($mysqli, "INSERT INTO antc_fami(id_pa_fk,pariente,enfermedad,descripcion) 
                                            VALUES('$id_paciente','$pariente','$enfermedad','$descri_a')")
                                            or die('error '.mysqli_error($mysqli));
            //Enfermedades
            
            $enfermedades = mysqli_query($mysqli, "INSERT INTO enfermedades(id_pa_fk,respiratoria,gastro_intestinal,neurologico,hematologico,alergia) 
                                            VALUES('$id_paciente','$resp','$gi','$neuro','$hemato','$aler')")
                                            or die('error '.mysqli_error($mysqli));
            //Habitos
            $habitos = mysqli_query($mysqli, "INSERT INTO habito(id_pa_fk,alcohol,tabaco,drogas,alimentacion,vida_sexual,sueno) 
                                            VALUES('$id_paciente','$alco','$taba','$dro','$al',' $vs','$sue')")
                                            or die('error '.mysqli_error($mysqli));
            //Diagnostico
            
            $diagnostico = mysqli_query($mysqli, "INSERT INTO diagnostico(enfermedad,descrip_sintomas,tratamiento,consulta_fk,examenes) 
                                            VALUES('$enf','$esp','$tra','$n_consulta','$er')")
                                            or die('error '.mysqli_error($mysqli));
            //Receta
             
            $query_id = mysqli_query($mysqli, "SELECT id_diagnostico FROM diagnostico ORDER BY id_diagnostico DESC LIMIT 1");

            $codigo = mysqli_fetch_assoc($query_id);

            $codigo = $codigo['id_diagnostico'];
            
            $receta = mysqli_query($mysqli, "INSERT INTO receta(medicamento,presentacion,dosis,duracion,cantidad,uso,diagnostico_fk) 
                                            VALUES('$medicamento','$presentacion','$dosis','$duracion','$cantidad','$empleo', '$codigo')")
                                            or die('error '.mysqli_error($mysqli));

            //Actualizar estado de consulta
            $query = mysqli_query($mysqli, "UPDATE
                                                 consulta
                                                 SET 
                                                 estado_c='Atendido'
                                                 WHERE 
                                                 n_consulta='$n_consulta'")
                                                or die('error: '.mysqli_error($mysqli));

            if ($antecedentes && enfermedades && $habitos && $diagnostico && $receta && $query) {
               header("location: ../../main.php?module=start&alert=1");
            }
            
        }   
    }   
}

?>