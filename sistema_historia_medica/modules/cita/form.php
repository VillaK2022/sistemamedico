<?php  

if ($_GET['form']=='add') { 

  $medico = mysqli_query($mysqli, "SELECT * FROM medico");
  $paciente = mysqli_query($mysqli, "SELECT * FROM paciente ");
  ?>


<div class="container">
 
     <div class="header mt-3 d-flex justify-content-between align-items-center">
        <p><i class="fa fa-edit icon-title"></i> Registrar Cita </p>

        <div class="list-group list-group-horizontal min-nav pull-right">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=cita"> Citas </a></li>
            <li class="active"> Agregar </li>
          </div>
     </div> 

     <div class="row align-items-stretch justify-content-center no-gutters mt-5 mb-3">
      <div class="col-md-10">
        <div class="form h-100 contact-wrap p-5">

          <h3 class="text-center">Cita Medica</h3>
          <hr>
          

          <form method="POST" action="modules/cita/proses.php?act=insert" id="contactForm" name="contactForm" onsubmit="return validar_cita()">

            
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="fecha" class="col-form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha">
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Motivo de la Consulta</label>
                <textarea class="form-control" id="mc" name="motivo" onkeyup="this.value=TextNumber(this.value)" ></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Paciente</label>
                <select class="form-select" aria-label="Default select example" id="paciente" name="paciente">
                  <option value="">Seleccione</option>
                    <?php 
                      while($datos = mysqli_fetch_array($paciente))
                      {
                      ?>
                      <option value="<?php echo $datos['id_paciente']?>"> <?php 
                      echo $datos['apellido_p'].' '.$datos['nombre'];
                      echo ' | '.' '.$datos['cedula_p']?> </option>
                    <?php
                      }
                    ?> 
                </select>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Doctor</label>
               <select class="form-select" aria-label="Default select example" id="doc" name="medico">
                  <option value="">Seleccione</option>
                    <?php 
                      while($datos = mysqli_fetch_array($medico))
                      {
                      ?>
                      <option value="<?php echo $datos['id_medico']?>"> <?php 
                      echo $datos['apellido'].' '.$datos['nombre_doc'];
                      echo ' | '.' '.$datos['especialidad']?> </option>
                    <?php
                      }
                    ?> 
                </select>
              </div>
            </div>

            <div class="col-sm-12 text-center mb-3">
              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
              <a href="?module=cita" class="btn btn-light btn-reset">Cancelar</a>
            </div>

            <div class="alert alert-danger" role="alert" id="mensaje"></div>
          </form>

        </div>
      </div>
    </div>
</div>
<?php
  
}elseif ($_GET['form']=='edit') { 
    if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT * FROM citas
                                                    AS
                                                    c,
                                                    paciente
                                                    AS
                                                    p,
                                                    medico
                                                    AS
                                                    m
                                                    WHERE 
                                                    id_cita='$_GET[id]'   
                                                    AND
                                                    c.id_pa_fk = p.id_paciente
                                                    AND
                                                    c.id_doc_fk = m.id_medico") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    $medico = mysqli_query($mysqli, "SELECT * FROM medico");
    $paciente = mysqli_query($mysqli, "SELECT * FROM paciente ");
?>

<div class="container">
 
     <div class="header mt-3 d-flex justify-content-between align-items-center">
        <p><i class="fa fa-edit icon-title"></i> Editar Cita </p>

        <div class="list-group list-group-horizontal min-nav pull-right">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=cita"> Citas </a></li>
            <li class="active"> Agregar </li>
          </div>
     </div> 

     <div class="row align-items-stretch justify-content-center no-gutters mt-5 mb-3">
      <div class="col-md-10">
        <div class="form h-100 contact-wrap p-5">

          <h3 class="text-center">Cita Medica</h3>
          <hr>
          

          <form method="POST" action="modules/cita/proses.php?act=update" id="contactForm" name="contactForm" onsubmit="return validar_cita()">

            
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="fecha" class="col-form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha" value='<?php echo $data ['fecha'] ?>'>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Motivo de la Consulta</label>
                <textarea class="form-control" id="mc" name="motivo" onkeyup="this.value=TextNumber(this.value)"><?php echo $data ['razon'] ?></textarea>
              </div>
            </div>

        
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Paciente</label>
                <select class="form-select" aria-label="Default select example" id="paciente" name="paciente">
                  <option value='<?php echo $data ['id_pa_fk'] ?>'> <?php  echo $data['apellido_p'].' '.$data['nombre'];
                      echo ' | '.' '.$data['cedula_p']?></option>
                  
                    <?php 
                      while($datos = mysqli_fetch_array($paciente))
                      {
                      ?>
                      <option value="<?php echo $datos['id_paciente']?>"> <?php 
                      echo $datos['apellido_p'].' '.$datos['nombre'];
                      echo ' | '.' '.$datos['cedula_p']?> </option>
                    <?php
                      }
                    ?> 
                </select>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Doctor</label>
               <select class="form-select" aria-label="Default select example" id="doc" name="medico">
               <option value='<?php echo $data ['id_medico'] ?>'> <?php  echo $data['apellido'].' '.$data['nombre_doc'];
                      echo ' | '.' '.$data['especialidad']?></option>
                    <?php 
                      while($datos = mysqli_fetch_array($medico))
                      {
                      ?>
                      <option value="<?php echo $datos['id_medico']?>"> <?php 
                      echo $datos['apellido'].' '.$datos['nombre_doc'];
                      echo ' | '.' '.$datos['especialidad']?> </option>
                    <?php
                      }
                    ?> 
                </select>
              </div>
            </div>
            
            <input type="hidden" name="id" value="<?php echo $data['id_cita'] ?>">

            <div class="col-sm-12 text-center mb-3">
              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
              <a href="?module=historial" class="btn btn-light btn-reset">Cancelar</a>
            </div>

            <div class="alert alert-danger" role="alert" id="mensaje"></div>
          </form>

        </div>
      </div>
    </div>
</div>
<?php 
  }
}
?>
