<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/ico.png" type="imge/x-icon">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <title>Iniciar sesión</title>
</head>
<body>
  <div class="container">

    <div class="row">

      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

        <div class="card border-0 shadow rounded-3 my-5">

          <div class="card-body p-4 p-sm-5">

            <h5 class="card-title text-center mb-5 fw-light fs-5">Iniciar sesión</h5>

            <form action="login-check.php" onsubmit="return validar_login()" method="POST" >
            	<?php  
 
	            if (empty($_GET['alert'])) {
	            echo "";
	            } 

	            elseif ($_GET['alert'] == 1) {
	              echo "

	              <div class='alert alert-danger alert-dismissible fade show' role='alert'>

	                <h4>Error al entrar!</h4>
	                <p>Usuario o la contraseña es incorrecta, vuelva a verificar su nombre de usuario y contraseña. <p>
	               
	              </div>";
	            }

	            elseif ($_GET['alert'] == 2) {
	            echo "

	              <div class='alert alert-success alert-dismissible fade show' role='alert'>
                     
                      <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
                      Sesion Cerrada

                    </div>";
	            }
	          ?>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                <label for="username">Nombre de usuario</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <label for="password">Contraseña</label>
              </div>

              <div class="d-grid">
                <button class="botoninicio" style="color:#fff" type="submit">Iniciar Sesión</button>
              </div>
              <br>
              <li class="volver"> <a href="index.html"  style="color:#fff">Volver a la pagina</a></li>
              

              <div class="alert alert-danger" role="alert" id="mensaje"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" href="assets/js/bootstrap.js"></script>
  
</body>
</html>