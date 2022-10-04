

<?php  

if ($_GET['form']=='add') { ?>

<div class="container">
 
      <div class="header mt-3 d-flex justify-content-between align-items-center">
        <p><i class="fa fa-edit icon-title"></i> Registrar Paciente </p>

        <div class="list-group list-group-horizontal min-nav pull-right">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=paciente"> Paciente </a></li>
            <li class="active"> Agregar </li>
          </div>
     </div> 

     <div class="row align-items-stretch justify-content-center no-gutters mt-5 mb-3">
      <div class="col-md-10">
        <div class="form h-100 contact-wrap p-5">
          <h3 class="text-center">Datos de Paciente</h3>

          <form method="POST" action="modules/paciente/proses.php?act=insert" id="contactForm" name="contactForm" onsubmit="return validar_paciente()">

             <?php  
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(n_hc,6) as codigo FROM paciente ORDER BY codigo DESC LIMIT 1") or die('error '.mysqli_error($mysqli));

                $count = mysqli_num_rows($query_id);

                if ($count <> 0) {
              
                    $data_id = mysqli_fetch_assoc($query_id);
                    $codigo    = $data_id['codigo']+1;
                } else {
                    $codigo = 1;
                }


                $buat_id   = str_pad($codigo, 6, "0", STR_PAD_LEFT);
                $codigo = "HC-$buat_id";
              ?>

            <div class="row">
              <div class="col-md-12 form-group mb-3">
                <label for="n_hc" class="col-form-label">Numero de Historia</label>
                <input type="text" class="form-control" name="n_hc" id="n_hc"  value="<?PHP echo $codigo?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ap_p" class="col-form-label">Apellido Paterno</label>
                <input type="text" class="form-control" name="ap_p" id="ap_p" onkeyup="this.value=Text(this.value)" placeholder="Apellido Paterno">
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="ap" class="col-form-label">Apellido Materno</label>
                <input type="text" class="form-control" name="ap_m" id="ap" onkeyup="this.value=Text(this.value)" placeholder="Apellido Materno">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="name" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" onkeyup="this.value=Text(this.value)" placeholder="Nombre">
              </div>
              <?php 

                if (isset($_GET['id'])) {
                   $id=$_GET['id'];
                

              ?>

              <div class="col-md-6 form-group mb-3">
                <label for="ci" class="col-form-label">Cedula</label>
                <input type="text" class="form-control" name="ci" id="ci"  value="<?php echo $id?>" readonly>
              </div>

              <?php  
                }else{

              ?>
              <div class="col-md-6 form-group mb-3">
                <label for="ci" class="col-form-label">Cedula</label>
                <input type="text" class="form-control" name="ci" id="ci" onkeyup="this.value=Numeros(this.value)"  placeholder="Cedula">
              </div>

              <?php  
                  }
                ?>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="fecha_n" class="col-form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_n" id="fecha_n" >
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="edad" class="col-form-label">Edad</label>
                <input type="text" class="form-control" name="edad" id="edad" onkeyup="this.value=Numeros(this.value)"  placeholder="Edad">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ocu_p" class="col-form-label">Ocupacion</label>
                <input type="text" class="form-control" name="ocu_p" id="ocu_p" onkeyup="this.value=Text(this.value)" placeholder="Ocupacion">
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Estado Civil</label>
                <select class="form-select" id="estado_c" aria-label="Default select example" name="estado_c">
                  <option value="">Seleccione</option>
                  <option value="Soltero/ra">Soltero/ra</option>
                  <option value="Casado/da">Casado/da</option>
                  <option value="Viudo/da">Viudo/da</option>
                  <option value="Divorciado/da">Divorciado/da</option>
                  <option value="Concubinato">Concubinato</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="reci" class="col-form-label">Residencia</label>
                <input type="text" class="form-control" name="reci" id="reci" onkeyup="this.value=Text(this.value)" placeholder="Recidencia">
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="tf" class="col-form-label">Telefono</label>
                <input type="text" class="form-control" name="tf" id="tf" onkeyup="this.value=Numeros(this.value)" placeholder="Telefono">
              </div>
            </div>

            <div class="col-sm-12 text-center mb-3">
              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
              <a href="?module=paciente" class="btn btn-light btn-reset">Cancelar</a>
            </div>
            <div class="alert alert-danger" role="alert" id="mensaje"></div>

          </form>
        </div>
      </div>
    </div>
</div>
<?php
}

elseif ($_GET['form']=='edit') { 
    if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT * FROM paciente WHERE id_paciente='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    } 
?>

 
<div class="container">
  <div class="header mt-3 d-flex justify-content-between align-items-center">
        <p><i class="fa fa-edit icon-title"></i> Editar datos paciente</p>

        <div class="list-group list-group-horizontal min-nav pull-right">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=paciente"> Paciente </a></li>
            <li class="active"> Editar </li>
          </div>
     </div> 
     <div class="row align-items-stretch justify-content-center no-gutters mt-5 mb-3">
      <div class="col-md-7">
        <div class="form h-100 contact-wrap p-5">
          <h3 class="text-center">Datos Paciente </h3>

          <form method="POST" action="modules/paciente/proses.php?act=update" id="contactForm" name="contactForm" onsubmit="return validar_paciente()">

            <div class="row">
              <div class="col-md-12 form-group mb-3">
                <label for="n_hc" class="col-form-label">Numero de Historia</label>
                <input type="text" class="form-control" name="n_hc" id="n_hc"  value="<?PHP echo $data['n_hc'] ?>" readonly>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ap_p" class="col-form-label">Apellido Paterno</label>
                <input type="text" class="form-control" name="ap_p" id="ap_p" onkeyup="this.value=Text(this.value)" value="<?php echo $data['apellido_p'] ?>">
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="ap" class="col-form-label">Apellido Materno</label>
                <input type="text" class="form-control" name="ap_m" id="ap" onkeyup="this.value=Text(this.value)" value="<?php echo $data['apellido_m'] ?>">
              </div>
            </div>


            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="name" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" onkeyup="this.value=Text(this.value)" value="<?php echo $data['nombre'] ?>" >
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="ci" class="col-form-label">Cedula</label>
                <input type="text" class="form-control" name="ci" id="ci" onkeyup="this.value=Numeros(this.value)" value='<?php echo $data ['cedula_p']?>' readonly>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="fecha_n" class="col-form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_n" id="fecha_n" value='<?php echo $data ['f_nacimiento'] ?>'>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="edad" class="col-form-label">Edad</label>
                <input type="text" class="form-control" name="edad" id="edad" onkeyup="this.value=Numeros(this.value)"  value='<?php echo $data ['edad']?>'>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ocu_p" class="col-form-label">Ocupacion</label>
                <input type="text" class="form-control" name="ocu_p" onkeyup="this.value=Text(this.value)" id="ocu_p"  value='<?php echo $data ['ocupacion'] ?>'>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Estado Civil</label>
                <select class="form-select" id="estado_c" aria-label="Default select example" name="estado_c">
                  <option value="<?php echo $data ['estado_civil'] ?>"><?php echo $data ['estado_civil'] ?></option>
                  <option value="Soltero/ra">Soltero/ra</option>
                  <option value="Casado/da">Casado/da</option>
                </select>
              </div>

             
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="reci" class="col-form-label">Residencia</label>
                <input type="text" class="form-control" name="reci" onkeyup="this.value=Text(this.value)" id="reci"  value='<?php echo $data ['residencia'] ?>'>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="tf" class="col-form-label">Telefono</label>
                <input type="text" class="form-control" name="tf" id="tf" onkeyup="this.value=Numeros(this.value)" value='<?php echo $data ['telefono']?>'>
              </div>
            </div>
            <input type="hidden" name="id_paciente" value="<?php echo $data['id_paciente']?>">
            <div class="col-sm-12 text-center mb-3">
              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
              <a href="?module=paciente" class="btn btn-light btn-reset">Cancelar</a>
            </div>

            <div class="alert alert-danger" role="alert" id="mensaje"></div>

          </form>

        </div>
      </div>
    </div>
</div>
<?php
}
?>