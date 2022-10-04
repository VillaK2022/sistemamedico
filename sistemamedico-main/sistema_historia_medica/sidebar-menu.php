<?php 

if ($_SESSION['permisos']=='Administrador') { ?>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
    <!-- ITEMS -->
    <div class="sidebar">
        <img src="img/logo.png" width="200" height="160">
        
            <li><a href="?module=start"><i class="fas fa-home"></i>Inicio</a></li>
            <li><a href="?module=user"><i class="fas fa-user"></i>Usuarios</a></li>
            <li><a href="?module=doc"><i class="fas fa-user-md"></i>Medico</a></li>
            <li><a href="?module=enf"><i class="fas fa-user-nurse"></i>Enfermera</a></li>
            <li><a href="./modules/back/index.php"><i class="fa-solid fa-arrow-rotate-left"></i></i>Mantenimiento</a></li>
            <li><a href="logout.php"><i class="fas fa-power-off"></i>Cerrar Sesion</a></li>
        
    </div>
<?php 

} //FIN DEL SUPER ADMIN

else if ($_SESSION['permisos']=='Medico/ca') { ?>

<!-- profile -->
   

     <!-- ITEMS -->
    <div class="sidebar">
        <img src="img/logo.png" width="200" height="160">
        
            <li><a href="?module=start"><i class="fas fa-home"></i>Inicio</a></li>
            <li><a href="?module=paciente"><i class="fas fa-user"></i>Pacientes</a></li>
            <li><a href="?module=cita"><i class="far fa-calendar-alt"></i> Citas</a></li>
            <li><a href="?module=historial"><i class="fas fa-book-medical"></i>Historias Clinicas</a></li>
            <li><a href="logout.php"><i class="fas fa-power-off"></i>Cerrar Sesion</a></li>
        
    </div>

<?php 

} //FIN DEL Gerente

else{

?>
<!-- profile -->
      <!-- ITEMS -->
    <div class="sidebar">
        <img src="img/logo.png" width="200" height="160">
        
            <li><a href="?module=start"><i class="fas fa-home"></i>Inicio</a></li>
            <li><a href="?module=paciente"><i class="fas fa-user"></i>Pacientes</a></li>
            <li><a href="?module=cita"><i class="fas fa-calendar-plus"></i>Asignar Cita</a></li> 
            <li><a href="?module=historial"><i class="fas fa-file-medical-alt"></i>Historias Clinicas</a></li>
            <li><a href="logout.php"><i class="fas fa-power-off"></i>Cerrar Sesion</a></li>
        
    </div>
<?php
} //FIN DE MANTENIMIENTO
?>