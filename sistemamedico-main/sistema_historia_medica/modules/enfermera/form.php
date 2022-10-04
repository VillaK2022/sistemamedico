

<?php  

if ($_GET['form']=='add') { ?>

<div class="container">
 
      <div class="header mt-3 d-flex justify-content-between align-items-center">
        <p><i class="fa fa-edit icon-title"></i> Registrar Enfermera/ro </p>

        <div class="list-group list-group-horizontal min-nav pull-right">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=enf"> Enfermera/ro </a></li>
            <li class="active"> Agregar </li>
          </div>
     </div> 

     <div class="row align-items-stretch justify-content-center no-gutters mt-5 mb-3">
      <div class="col-md-7">
        <div class="form h-100 contact-wrap p-5">
          <h3 class="text-center">Datos de Enfermera/ro</h3>

          <form method="POST" action="modules/enfermera/proses.php?act=insert" id="contactForm" name="contactForm" onsubmit="return validar_enfermera()">
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ap" class="col-form-label">Apellido</label>
                <input type="text" class="form-control" name="ap" id="ap" onkeyup="this.value=Text(this.value)"  placeholder="Apellido">
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="name" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" onkeyup="this.value=Text(this.value)" placeholder="Nombre">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ci" class="col-form-label">Cedula</label>
                <input type="text" class="form-control" name="ci" id="ci" onkeyup="this.value=Numeros(this.value)"  placeholder="Cedula" >
              </div>
              
              <div class="col-md-6 form-group mb-3">
                <label for="tf" class="col-form-label">Telefono</label>
                <input type="text" class="form-control" name="tf" id="tf" onkeyup="this.value=Numeros(this.value)" placeholder="Telefono">
              </div>
            </div>

            <div class="col-sm-12 text-center mb-3">
              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
              <a href="?module=enf" class="btn btn-light btn-reset">Cancelar</a>
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

      $query = mysqli_query($mysqli, "SELECT * FROM enfermera WHERE id_enfermera='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    } 
?>

 
<div class="container">
  <div class="header mt-3 d-flex justify-content-between align-items-center">
        <p><i class="fa fa-edit icon-title"></i> Editar Enfermera/ro</p>

        <div class="list-group list-group-horizontal min-nav pull-right">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=enf"> Enfermera/ro </a></li>
            <li class="active"> Editar </li>
          </div>
     </div> 
     <div class="row align-items-stretch justify-content-center no-gutters mt-5 mb-3">
      <div class="col-md-7">
        <div class="form h-100 contact-wrap p-5">
          <h3 class="text-center">Datos Enfermera/ro </h3>

          <form method="POST" action="modules/enfermera/proses.php?act=update" id="contactForm" name="contactForm" onsubmit="return validar_enfermera()">
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="name" class="col-form-label">Apellido</label>
                <input type="text" class="form-control" name="ap" id="ap" onkeyup="this.value=Text(this.value)" value="<?php echo $data['apellido'] ?>">
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="name" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" onkeyup="this.value=Text(this.value)" value="<?php echo $data['nombre'] ?>">
              </div>
            </div>


            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ci" class="col-form-label">Cedula</label>
                <input type="text" class="form-control" name="ci" id="ci" onkeyup="this.value=Numeros(this.value)"  value="<?php echo $data['cedula']?>" readonly>
              </div>
              
              <div class="col-md-6 form-group mb-3">
                <label for="tf" class="col-form-label">Telefono</label>
                <input type="text" class="form-control" name="tf" id="tf" onkeyup="this.value=Numeros(this.value)" value="<?php echo $data['telefono']?>">
              </div>
            </div>

            <input type="hidden" name="id_enfermera" value="<?php echo $data["id_enfermera"];?>">

            <div class="col-sm-12 text-center mb-3">
              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
              <a href="?module=enf" class="btn btn-light btn-reset">Cancelar</a>
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