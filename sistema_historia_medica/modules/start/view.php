<?php if ($_SESSION['permisos']=='Enfermera/ro'){

?>	

	<div class="container">
		<div class="row align-items-stretch justify-content-center no-gutters mt-5 mb-3">
	      	<div class="col-md-7">
		        <div class="form h-100 contact-wrap p-5">
		          <h3 class="text-center">Consulta</h3>

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

           

            elseif ($_GET['alert'] == 4) {
              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      <h4>  <i class='icon fa fa-check-circle'></i> Error!</h4>
                     El medico o medica ya cumplio su limite de pacientes por este dia
                    </div>";
            }
            ?>

		          	<form method="POST" action="modules/start/proses.php" id="contactForm" name="contactForm">
		          

			            <div class="row">
			              <div class="col-md-12 form-group mb-3">
			                <label for="ci" class="col-form-label">Cedula</label>
			                <input type="text" class="form-control" name="ci" id="ci" onkeyup="this.value=Numeros(this.value)"  placeholder="Cedula">
			              </div>
			            </div>
			           
			          
			            <div class="col-sm-12 text-center mb-3">
			              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Ingresar">
			              <input type="reset" class="btn btn-light btn-reset" value="Borrar">
			            </div>
			        </form>
		        </div>
	      	</div>
    	</div>
	</div>
<?php 
} else if ($_SESSION['permisos']=='Medico/ca'){
  
  $ci = $_SESSION['ci'];
  $consulta = mysqli_query($mysqli, "SELECT * FROM consulta 
  												    AS
  												    c,
  												    medico
  												    AS
  												    m
  												    WHERE 
  												    c.id_doc_fk = m.id_medico
  												    AND 
  												    m.cedula = '$ci'
  												    ");

  $rows  = mysqli_num_rows($consulta);

  if ($rows > 0) {
  
?>
<div class="container col-md-12 col-sm-12">
	<section class="">
      <table id="example" class="table table-hover " id="table-stylo">
        <thead>
                <tr>
                    <th align="center">No.</th>
                    <th align="center">Apellidos</th>
                    <th align="center">Nombre</th>
                    <th align="center">Cedula</th>
                    <th align="center">Motivo</th>
                    <th class="text-center align-items-center" align="center">Atender</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    $no = 1;
                    $fecha = date("Y/m/d");
                    $query = mysqli_query($mysqli, "SELECT * FROM consulta
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
                    											  AND
                    											  c.fecha_r = '$fecha'
                                            
                                            AND
                                            c.estado_c = 'Sin Atender'

                    											  ORDER BY n_consulta ASC") or die('error: '.mysqli_error($mysqli));
                    while ($data = mysqli_fetch_assoc($query)) {


                        echo "<tr>
                                <td width='10' class='center'>$no</td>";
                        echo "  <td width='100'>$data[apellido_p] $data[apellido_m]</td>
                        		<td width='100'>$data[nombre]</td>
                                <td width='100'>$data[cedula]</td>
                                <td width='100'>$data[motivo]</td>
                               
                               

                             	<td width='20' class='center'>
                                  <div class='text-center align-items-center'>";


                  echo "      <a data-toggle='tooltip' data-placement='top' title='Atender' class='btn btn-primary btn-sm ' href='?module=form_diagn&id_consulta=$data[n_consulta]'>
                                    <i style='color:#fff' class='fas fa-user-check'></i>
                                </a>

                                </td>
                              ";
                  ?>
                        </tr> 

                  <?php 
                  $no++;
                }
                ?>
              </tbody>
      </table>
    </section>
</div>
<?php 
}
}
?>