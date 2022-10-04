<?php  

  if ($_SESSION['permisos']=='Enfermera/ro'){

?>

<div class="container col-md-12 col-sm-12">
   <div class="header mt-3 d-flex justify-content-between align-items-center mb-3">
    <p><i class="fas fa-user"></i> Historial Clinico</p>
      
   </div> 

    <div class="row">

        <div class="col-md-12">

            <?php  

            if (empty($_GET['alert'])) {
              echo "";
              } 

              elseif ($_GET['alert'] == 1) {
                echo "

                <div class='alert alert-danger alert-dismissible fade show' role='alert'>

                  <h4>Error !</h4>
                  <p>NO SE CONSIGUIO NINGUN REGISTRO EN LA FECHA ESTABLECIDA. INTENTE DE NUEVO <p>
                 
                </div>";
              }
            
            ?>
            <!-- Main content -->
            <section class="">
              <table id="example" class="table table-hover" id="table-stylo">
                <thead>
                        <tr>
                            <th align="center">No. Historia</th>
                            <th align="center">Apellidos</th>
                            <th align="center">Nombre</th>
                            <th align="center">Cedula</th>
                            <th align="center">Telefono</th>
                            <th align="center">Ver Historia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            
                            $query = mysqli_query($mysqli, "SELECT * FROM paciente ORDER BY n_hc ASC") or die('error: '.mysqli_error($mysqli));
                            while ($data = mysqli_fetch_assoc($query)) {


                                echo "<tr>
                                        <td width='10' class='center'>$data[n_hc]</td>";
                                echo "  <td width='100'>$data[apellido_p] $data[apellido_m]</td>
                                        <td width='100'>$data[nombre]</td>
                                         <td width='100'>$data[cedula_p]</td>
                                         <td width='100'>$data[telefono]</td>

                                         <td width='20' class='center'>
                                          <div class='text-center align-items-center'>
                                             <a data-toggle='tooltip' data-placement='top' title='Ver' class='  btn btn-primary btn-sm ' href='?module=hc&id=$data[n_hc]'>
                                              <i style='color:#fff' class='fas fa-notes-medical'></i>
                                              </a>
                                          </div> 
                                      </td>

                                     ";
                          ?>
                                </tr> 

                          <?php 
                        
                        }
                        ?>
                      </tbody>
              </table>
            </section>
        </div>
    </div>
</div>

<?php 

}elseif ($_SESSION['permisos']=='Medico/ca') {
  
?>

<div class="container col-md-12 col-sm-12">
   <div class="header mt-3 d-flex justify-content-between align-items-center mb-3">
    <p><i class="fas fa-user"></i> Mis pacientes - Historial Clinico</p>
   </div> 

    <div class="row">

        <div class="col-md-12">
           <?php  


            if (empty($_GET['alert'])) {
              echo "";
              } 

              elseif ($_GET['alert'] == 1) {
                echo "

                <div class='alert alert-danger alert-dismissible fade show' role='alert'>

                  <h4>Error !</h4>
                  <p>NO SE CONSIGUIO NINGUN REGISTRO EN LA FECHA ESTABLECIDA. INTENTE DE NUEVO <p>
                 
                </div>";
              }

          ?>


            <!-- Main content -->
            <section class="">
              <table id="example" class="table table-hover" id="table-stylo">
                <thead>
                        <tr>
                            <th align="center">No. Historia</th>
                            <th align="center">Apellidos</th>
                            <th align="center">Nombre</th>
                            <th align="center">Cedula</th>
                            <th align="center">Telefono</th>
                            <th align="center">Ver Historia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $ci = $_SESSION['ci'];

                            $query =  mysqli_query($mysqli, "SELECT * FROM medico_paciente 
                                                                                  AS
                                                                                  c,
                                                                                  medico
                                                                                  AS
                                                                                  m,
                                                                                  paciente
                                                                                  AS
                                                                                  p
                                                                                  WHERE 
                                                                                  c.id_doc_fk = m.id_medico
                                                                                  AND 
                                                                                  m.cedula = '$ci'
                                                                                  AND
                                                                                  c.id_pa_fk = p.id_paciente

                                                                            

                                                                                 
                                                                                  ") or die('error: '.mysqli_error($mysqli));
                           
                            while ($data = mysqli_fetch_assoc($query)) {


                                echo "<tr>
                                        <td width='10' class='center'>$data[n_hc]</td>";
                                echo "  <td width='100'>$data[apellido_p] $data[apellido_m]</td>
                                        <td width='100'>$data[nombre]</td>
                                         <td width='100'>$data[cedula]</td>
                                         <td width='100'>$data[telefono]</td>

                                         <td width='20' class='center'>
                                          <div class='text-center align-items-center'>
                                             <a data-toggle='tooltip' data-placement='top' title='Ver' class='  btn btn-primary btn-sm ' href='?module=hc&id=$data[n_hc]'>
                                              <i style='color:#fff' class='fas fa-notes-medical'></i>
                                              </a>
                                          </div> 
                                      </td>

                                     ";

                                     //?module=form_pac&form=edit&id=$data[id_paciente]

                                     //href='modules/historial_clinico/historial.php?id=<?php echo $data['n_hc'];'
                         
                       
                            ?>
                           </tr> 

                          <?php 
                        
                        }
                        ?>
                      </tbody>
              </table>
            </section>
        </div>
    </div>
</div>




<?php  

}

?>

