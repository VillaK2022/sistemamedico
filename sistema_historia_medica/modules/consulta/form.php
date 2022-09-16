

<?php  

if ($_GET['form']=='add') { 

  $id=$_GET['id']; 
  $medico = mysqli_query($mysqli, "SELECT * FROM medico");
  $paciente = mysqli_query($mysqli, "SELECT * FROM paciente WHERE cedula_p='$id'");
  $datos  = mysqli_fetch_assoc($paciente);

  ?>

<div class="container">
 
      <div class="header mt-3 d-flex justify-content-between align-items-center">
        <p><i class="fa fa-edit icon-title"></i> Registro de Consulta</p>

        <div class="list-group list-group-horizontal min-nav pull-right">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=start"> Consulta </a></li>
            <li class="active"> Agregar </li>
          </div>
     </div> 

     <div class="row align-items-stretch justify-content-center no-gutters mt-5 mb-3">
      <div class="col-md-8">
        <div class="form h-100 contact-wrap p-5">
          <h3 class="text-center">Registro Consulta</h3>

          <form method="POST" action="modules/consulta/proses.php?act=insert" id="contactForm" name="contactForm" onsubmit="return validar_consulta()">

            <div class="row">
              <div class="col-md-4 form-group mb-3">
                <label for="ci" class="col-form-label">Cedula</label>
                <input type="text" class="form-control" name="ci" id="ci"  value="<?php echo $id ?>" readonly>
              </div>
          
                    
              <div class="col-md-8 form-group mb-3">
                <label for="pac" class="col-form-label">Apellido Nombre</label>
                <input type="text" class="form-control" id="pac"  value="<?php echo $datos['apellido_p'].' '.$datos['apellido_m'].' '.$datos['nombre'] ?>" readonly>

                <input type="hidden" name="paciente" value="<?php echo $datos['id_paciente']?>">
               
              </div>
            </div>

            <div class="row">
             <div class="col-md-12 form-group mb-3">
                <label for="tf" class="col-form-label">Motivo</label>
                <textarea class="form-control" id="motivo" onkeyup="this.value=TextNumber(this.value)" name="motivo"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 form-group mb-3">
                <label for="budget" class="col-form-label">Medico/ca</label>
                <select class="form-select" id="medico" aria-label="Default select example" name="medico">
                  <option value="">Sleccione</option>
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

            <hr>

            <h3 class="text-center">Examen Fisico</h3>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ap" class="col-form-label">Presion Arterial</label>
                <input type="text" class="form-control" name="p_a" id="ap" onkeyup="this.value=TextNumberEsp(this.value)"  placeholder="Presion">
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="name" class="col-form-label">Temperatura</label>
                <input type="text" class="form-control" name="temp" id="temp" onkeyup="this.value=TextNumberEsp(this.value)" placeholder="Temperatura">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="fr" class="col-form-label">Frecuencia Respiratoria</label>
                <input type="text" class="form-control" name="fr" id="fr" onkeyup="this.value=TextNumberEsp(this.value)"  placeholder="x minuto">
              </div>
              
              <div class="col-md-6 form-group mb-3">
                <label for="fc" class="col-form-label">Frecuencia Cardiaca</label>
                <input type="text" class="form-control" name="fc" id="fc" onkeyup="this.value=TextNumberEsp(this.value)" placeholder="x minuto">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="alt" class="col-form-label">Altura</label>
                <input type="text" class="form-control" name="alt" id="alt" onkeyup="this.value=TextNumberEsp(this.value)"  placeholder="Altura">
              </div>
              
              <div class="col-md-6 form-group mb-3">
                <label for="peso" class="col-form-label">Peso</label>
                <input type="text" class="form-control" name="peso" id="peso" onkeyup="this.value=TextNumberEsp(this.value)" placeholder="Peso">
              </div>
            </div>

            <div class="col-sm-12 text-center mb-3">
              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
              <a href="?module=start" class="btn btn-light btn-reset">Cancelar</a>
            </div>

            <div class="alert alert-danger" role="alert" id="mensaje"></div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php
}

