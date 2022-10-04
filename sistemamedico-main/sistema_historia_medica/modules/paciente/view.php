<?php  

  if ($_SESSION['permisos']=='Enfermera/ro'){

?>

<div class="container col-md-12 col-sm-12">
   <div class="header mt-3 d-flex justify-content-between align-items-center mb-3">
    <p><i class="fas fa-user"></i> Registro de Pacientes</p>
    <div>

      <a class="btn btn-primary btn-social " href="?module=form_pac&form=add" title="Agregar" data-toggle="tooltip">
          <i class="fas fa-plus"></i> Agregar
      </a>
    </div>
      
   </div> 

    <div class="row">

        <div class="col-md-12">

            <?php  

            if (empty($_GET['alert'])) {
              echo "";
            } 

            elseif ($_GET['alert'] == 1) {
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
                      Los nuevos datos se han registrado correcamente.
                    </div>";
            }

            elseif ($_GET['alert'] == 2) {
             echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
                   Los datos han sido cambiados satisfactoriamente.
                    </div>";
            }

            elseif ($_GET['alert'] == 3) {
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
                     Datos eliminados exitosamente
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
                            <th align="center">Fecha-Nacimiento</th>
                            <th align="center">Edad</th>
                            <th align="center">Residencia</th>
                            <th align="center">Telefono</th>
                            <th align="center">Editar</th>
                            <th align="center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            
                            $query = mysqli_query($mysqli, "SELECT * FROM paciente ORDER BY n_hc ASC") or die('error: '.mysqli_error($mysqli));
                            while ($data = mysqli_fetch_assoc($query)) {


                              $tanggal_i = $data['f_nacimiento'];
                              $exp_i  = explode('-',$tanggal_i);
                              $fecha_i = $exp_i[2]."-".$exp_i[1]."-".$exp_i[0];


                                echo "<tr>
                                        <td width='10' class='center'>$data[n_hc]</td>";
                                echo "  <td width='100'>$data[apellido_p] $data[apellido_m]</td>
                                        <td width='100'>$data[nombre]</td>
                                         <td width='100'>$data[cedula_p]</td>
                                         <td width='100'>$fecha_i</td>
                                         <td width='100'>$data[edad]</td>
                                         <td width='100'>$data[residencia]</td>
                                         <td width='100'>$data[telefono]</td>

                                     <td width='20' class='center'>
                                          <div>";


                          echo "      <a data-toggle='tooltip' data-placement='top' title='Modificar' class='btn btn-primary btn-sm' href='?module=form_pac&form=edit&id=$data[id_paciente]'>
                                            <i style='color:#fff' class='fas fa-user-edit'></i>
                                        </a>

                                        </td>
                                      ";
                          ?><td width='20' class='center'>
                                          
                                <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/paciente/proses.php?act=delete&id=<?php echo $data['id_paciente'];?>">
                                    <i style="color:#fff" class="far fa-trash-alt"></i>
                                </a>
                                  </div>
                                  </td>
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
    <p><i class="fas fa-user"></i> Mis pacientes</p>
   </div> 

    <div class="row">

        <div class="col-md-12">


            <!-- Main content -->
            <section class="">
              <table id="example" class="table table-hover" id="table-stylo">
                <thead>
                        <tr>
                            <th align="center">No. Historia</th>
                            <th align="center">Apellidos</th>
                            <th align="center">Nombre</th>
                            <th align="center">Cedula</th>
                            <th align="center">Fecha-Nacimiento</th>
                            <th align="center">Edad</th>
                            <th align="center">Residencia</th>
                            <th align="center">Telefono</th>
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
                                         <td width='100'>$data[cedula_p]</td>
                                         <td width='100'>$data[f_nacimiento]</td>
                                         <td width='100'>$data[edad]</td>
                                         <td width='100'>$data[residencia]</td>
                                         <td width='100'>$data[telefono]</td>

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

}

?>

