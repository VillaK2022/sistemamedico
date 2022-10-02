<div class="container col-md-12 col-sm-12">
	 <div class="header mt-3 d-flex justify-content-between align-items-center mb-3">
    <p><i class="fas fa-user"></i> Gestión de Usuario</p>

	 	<a class="btn btn-primary btn-social " href="?module=form_user&form=add" title="Agregar" data-toggle="tooltip">
	      <i class="fas fa-plus"></i> Agregar
	    </a>
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
                     Usuario eliminado exitosamente
                    </div>";
            }
            ?>
            <!-- Main content -->
            <section class="mb-3">
              <table id="example" class="table table-hover" id="table-stylo">
                <thead>
                        <tr>
                            <th align="center">No.</th>
                            <th align="center">Username</th>
                            <th align="center">Contraseña</th>
                            <th align="center">Cedula</th>
                            <th align="center">Permisos de acceso</th>
                            <th class="text-center align-items-center" align="center">Editar</th>
                            <th class="text-center align-items-center" align="center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $no = 1;
                            $query = mysqli_query($mysqli, "SELECT * FROM usuario ORDER BY id_usuario ASC") or die('error: '.mysqli_error($mysqli));
                            while ($data = mysqli_fetch_assoc($query)) {


                                echo "<tr>
                                        <td width='10' class='center'>$no</td>";
                                echo "  <td width='150'>$data[username]</td>
                                        <td width='150'>$data[pass]</td>
                                        <td width='150'>$data[cedula]</td>
                                      
                                     <td width='150'>$data[permisos]</td>

                                     <td width='50' class='center'>
                                          <div class='text-center align-items-center'>";


                          echo "      <a data-toggle='tooltip' data-placement='top' title='Modificar' class='btn btn-primary btn-sm' href='?module=form_user&form=edit&id=$data[id_usuario]'>
                                            <i style='color:#fff' class='fas fa-user-edit'></i>
                                        </a>
                                        </div>
                                        </td>
                                      ";
                          ?><td width='50' class='center'>
                                <div class="text-center align-items-center">
                                          
                                <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/user/proses.php?act=delete&id=<?php echo $data['id_usuario'];?>" onclick="return confirm('estas seguro de eliminar el usuario de <?php echo $data[nombre].$data[apellido]; ?>')">
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

