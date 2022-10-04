

<?php  



if (isset($_GET['id'])) { 

  $id = $_GET['id'];

  $query = mysqli_query($mysqli, "SELECT * FROM paciente WHERE n_hc='$id'") 
                                      or die('error: '.mysqli_error($mysqli));
  $data  = mysqli_fetch_assoc($query);
?>

<div class="container">
 
  <!--TENGO QUE PONER UN FORMULARIO QUE ME SELECCIONE UNA FECHA Y LUEGO SI MANDAR EL PUTO ID -->

     <div class="row align-items-stretch justify-content-center no-gutters mt-5 mb-3">
      <div class="col-md-10">
        <div class="form h-100 contact-wrap p-5">
          <?php  


            if (empty($_GET['alert'])) {
              echo "";
              } 

              elseif ($_GET['alert'] == 1) {
                echo "

                <div class='alert alert-danger alert-dismissible fade show' role='alert'>

                  <h4>Error !</h4>
                  <p>NO SE CONSIGUIO NINGUN REGISTRO EN LA FECHA ESTABLECIDA. <p>
                 
                </div>";
              }

          ?>
          <h3 class="text-center">Seleccione la Fecha en que desea ver el Historial</h3>
          <hr>
          

          <form method="GET" action="modules/pdf_hc/print.php" id="contactForm" name="contactForm"  onsubmit="return validar_fecha()">

            <input type="hidden" name="n_hc" value="<?php echo $data['n_hc'] ?>">

            
            <div class="row">
              <div class="col-md-12 form-group mb-3">
                <label for="fecha" class="col-form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha">
              </div> 
            </div>

            <div class="col-sm-12 text-center mb-3">
              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Ver">
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
