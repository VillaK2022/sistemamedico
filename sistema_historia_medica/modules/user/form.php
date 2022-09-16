

<?php  

if ($_GET['form']=='add') { ?>

<div class="container">
 
      <div class="header mt-3 d-flex justify-content-between align-items-center">
        <p><i class="fa fa-edit icon-title"></i> Registrar Usuario</p>

        <div class="list-group list-group-horizontal min-nav pull-right">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=user"> Usuario </a></li>
            <li class="active"> Agregar </li>
          </div>
     </div> 
     <div class="row align-items-stretch justify-content-center no-gutters mt-5">
      <div class="col-md-9">
        <div class="form h-100 contact-wrap p-5">
          <h3 class="text-center">Datos Usuario</h3>

          <form method="POST" action="modules/user/proses.php?act=insert" id="contactForm" name="contactForm"  onsubmit="return validar_user()">
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="name" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Usuario_123">
              </div>
              <div class="col-md-6 form-group mb-3">
                <label for="pass" class="col-form-label">Contraseña</label>
                <input type="text" class="form-control" name="pass" id="pass"  placeholder="12345678">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ci" class="col-form-label">Cedula</label>
                <input type="text" class="form-control" name="ci" id="ci" onkeyup="this.value=Numeros(this.value)"  placeholder="Cedula">
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Permisos</label>
                <select class="form-select" aria-label="Default select example" id="permiso" name="permisos">
                  <option value="">Sleccione</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Medico/ca">Medico/ca</option>
                  <option value="Enfermera/ro">Enfermera/ro</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12 text-center mb-3">
              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
              <a href="?module=user" class="btn btn-light btn-reset">Cancelar</a>
            </div>

            <div class="alert alert-danger" role="alert" id="mensaje"></div>
          </form>

        </div>
      </div>

    </div>
    <br><br>
</div>
<?php
}

elseif ($_GET['form']=='edit') { 
  	if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT * FROM usuario WHERE id_usuario='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
  	}	
?>

 
<div class="container">
  <div class="header mt-3 d-flex justify-content-between align-items-center">
        <p><i class="fa fa-edit icon-title"></i> Editar Usuario</p>

        <div class="list-group list-group-horizontal min-nav pull-right">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=user"> Usuario </a></li>
            <li class="active"> Editar </li>
          </div>
     </div> 
     <div class="row align-items-stretch justify-content-center no-gutters mt-5">
      <div class="col-md-7">
        <div class="form h-100 contact-wrap p-5">
          <h3 class="text-center">Datos Usuario</h3>

          <form method="POST" action="modules/user/proses.php?act=update" id="contactForm" name="contactForm"  onsubmit="return validar_user()">
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="name" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="username" id="username" value="<?php echo $data['username'] ?>">
              </div>
              <div class="col-md-6 form-group mb-3">
                <label for="pass" class="col-form-label">Contraseña</label>
                <input type="text" class="form-control" name="pass" id="pass"  value="<?php echo $data['pass'] ?>">
              </div>
            </div>


            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ci" class="col-form-label">Cedula</label>
                <input type="text" class="form-control" name="ci" id="ci" onkeyup="this.value=Numeros(this.value)"  value="<?php echo $data['cedula'] ?>" readonly>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Permisos</label>
                <select class="form-select" aria-label="Default select example" id="permiso" name="permisos">
                  <option value="<?php echo $data['permisos']?>"><?php echo $data['permisos'] ?></option>
                  <option value="Administrador">Administrador</option>
                  <option value="Medico/ca">Medico/ca</option>
                  <option value="Enfermera/ro">Enfermera/ro</option>
                </select>
              </div>
            </div>

            <input type="hidden" name="id_usuario" value="<?php echo $data["id_usuario"];?>">

            <div class="col-sm-12 text-center mb-3">
              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
              <a href="?module=user" class="btn btn-light btn-reset">Cancelar</a>
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