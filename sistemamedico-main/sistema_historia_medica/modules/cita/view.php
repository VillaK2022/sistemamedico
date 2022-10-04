<?php if ($_SESSION['permisos']=='Enfermera/ro'){

?>

<!-- ACOMODAR LA FECHA -->
<div class="container col-md-12 col-sm-12">
   <div class="header mt-3 d-flex justify-content-between align-items-center mb-3">
    <p><i class="fas fa-user-md"></i> Registro de Citas</p>
     <div>
        <a class="btn btn-primary btn-social " href="?module=form_cita&form=add" title="Agregar" data-toggle="tooltip">
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

            elseif ($_GET['alert'] == 4) {
              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      <h4>  <i class='icon fa fa-check-circle'></i> Error!</h4>
                     El medico o medica ya cumplio su limite de citas para ese dia
                    </div>";
            }
            ?>
            <!-- Main content -->
            <section class="">
              <table id="example" class="table table-hover" id="table-stylo">
                <thead>
                        <tr>
                            <th align="center">No.</th>
                            <th align="center">Apellidos</th>
                            <th align="center">Nombre</th>
                            <th align="center">Cedula</th>
                            <th align="center">Telefono</th>
                            <th align="center">Motivo</th>
                            <th align="center">Doctor</th>
                            <th align="center">Fecha</th>
                            <th align="center">Ubicacion</th>
                            <th align="center">Editar</th>
                            <th align="center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $no = 1;
                            $query = mysqli_query($mysqli, "SELECT * FROM 

                                                                          citas
                                                                          AS
                                                                          a,
                                                                          paciente
                                                                          AS
                                                                          b,
                                                                          medico
                                                                          AS
                                                                          c
                                                                          WHERE

                                                                          a.id_pa_fk = b.id_paciente
                                                                          AND
                                                                          a.id_doc_fk = c.id_medico
                                                                           ORDER BY id_cita DESC") or die('error: '.mysqli_error($mysqli));
                            while ($data = mysqli_fetch_assoc($query)) {

                            	$tanggal_i = $data['fecha'];
	            				$exp_i  = explode('-',$tanggal_i);
	           					$fecha_i = $exp_i[2]."-".$exp_i[1]."-".$exp_i[0];

                                echo "<tr>
                                        <td width='10' class='center'>$no</td>";
                                echo "  <td width='100'>$data[apellido_p] $data[apellido_m]</td>
                                         <td width='100'>$data[nombre]</td>
                                         <td width='100'>$data[cedula_p]</td>
                                         <td width='100'>$data[telefono]</td>
                                         <td width='100'>$data[razon]</td>
                                         <td width='100'>$data[apellido] $data[nombre_doc] | $data[especialidad]</td>
                                         <td width='200'>$fecha_i</td>
                                         <td width='100'>$data[ubicacion]</td>

                                     <td width='20' class='center'>
                                          <div>";


                          echo "      <a data-toggle='tooltip' data-placement='top' title='Modificar' class='btn btn-primary btn-sm' href='?module=form_cita&form=edit&id=$data[id_cita]'>
                                            <i style='color:#fff' class='fas fa-user-edit'></i>
                                        </a>

                                        </td>
                                      ";
                          ?><td width='20' class='center'>
                                          
                                <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/cita/proses.php?act=delete&id=<?php echo $data['id_cita'];?>">
                                    <i style="color:#fff" class="far fa-trash-alt"></i>
                                </a>
                                  </div>
                                  </td>
                                </tr> 

                          <?php 
                          $no++;
                        }
                        ?>
                      </tbody>
              </table>
            </section>
        </div>
    </div>
</div>

<?php  
}elseif ($_SESSION['permisos']=='Medico/ca'){

?>

<div class="container col-md-12 col-sm-12">
   <div class="header mt-3 d-flex justify-content-between align-items-center mb-3">
    <p><i class="fas fa-user-md"></i> Registro de Citas</p>
     <div>
        <a class="btn btn-primary btn-social " href="?module=form_cita&form=add" title="Agregar" data-toggle="tooltip">
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

            elseif ($_GET['alert'] == 4) {
              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      <h4>  <i class='icon fa fa-check-circle'></i> Error!</h4>
                     El medico o medica ya cumplio su limite de citas para ese dia
                    </div>";
            }
            ?>
            <!-- Main content -->
            <section class="">
              <table id="example" class="table table-hover" id="table-stylo">
                <thead>
                        <tr>
                            <th align="center">No.</th>
                            <th align="center">Apellidos</th>
                            <th align="center">Nombre</th>
                            <th align="center">Cedula</th>
                            <th align="center">Telefono</th>
                            <th align="center">Motivo</th>
                            <th align="center">Doctor</th>
                            <th align="center">Fecha</th>
                            <th align="center">Ubicacion</th>
                            <th align="center">Editar</th>
                            <th align="center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $no = 1;
                            $query = mysqli_query($mysqli, "SELECT * FROM 

                                                                          citas
                                                                          AS
                                                                          a,
                                                                          paciente
                                                                          AS
                                                                          b,
                                                                          medico
                                                                          AS
                                                                          c
                                                                          WHERE

                                                                          a.id_pa_fk = b.id_paciente
                                                                          AND
                                                                          a.id_doc_fk = c.id_medico
                                                                           ORDER BY id_cita DESC") or die('error: '.mysqli_error($mysqli));
                            while ($data = mysqli_fetch_assoc($query)) {

                              $tanggal_i = $data['fecha'];
                      $exp_i  = explode('-',$tanggal_i);
                      $fecha_i = $exp_i[2]."-".$exp_i[1]."-".$exp_i[0];

                                echo "<tr>
                                        <td width='10' class='center'>$no</td>";
                                echo "  <td width='100'>$data[apellido_p] $data[apellido_m]</td>
                                         <td width='100'>$data[nombre]</td>
                                         <td width='100'>$data[cedula_p]</td>
                                         <td width='100'>$data[telefono]</td>
                                         <td width='100'>$data[razon]</td>
                                         <td width='100'>$data[apellido] $data[nombre_doc] | $data[especialidad]</td>
                                         <td width='200'>$fecha_i</td>
                                         <td width='100'>$data[ubicacion]</td>

                                     <td width='20' class='center'>
                                          <div>";


                          echo "      <a data-toggle='tooltip' data-placement='top' title='Modificar' class='btn btn-primary btn-sm' href='?module=form_cita&form=edit&id=$data[id_cita]'>
                                            <i style='color:#fff' class='fas fa-user-edit'></i>
                                        </a>

                                        </td>
                                      ";
                          ?><td width='20' class='center'>
                                          
                                <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/cita/proses.php?act=delete&id=<?php echo $data['id_cita'];?>">
                                    <i style="color:#fff" class="far fa-trash-alt"></i>
                                </a>
                                  </div>
                                  </td>
                                </tr> 

                          <?php 
                          $no++;
                        }
                        ?>
                      </tbody>
              </table>
            </section>
        </div>
    </div>
</div>

<?php } ?>
