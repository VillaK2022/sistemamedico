<?php  
	session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/ico.png" type="imge/x-icon">
    <!-- Estilo CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" /> 
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <!-- DATATABLE -->
    <link href="assets/plugins/datatables/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="" />
    <!-- Font Awesome Icons -->
    <link href="assets/plugins/font-awesome-5.15.3/css/all.min.css" rel="stylesheet" type="text/css" />
	<title>Sistema - Historias Medicas</title>
</head>
<body class="cuerpo">

    <div class="wrapper">

        <?php include "sidebar-menu.php" ?>
    

        <div class="main_content">
            <?php include "content.php" ?>
        </div>

    </div>
  

  
    <!-- JQUERY -->
    <script src="assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <!-- Bootstrap 5.0 JS -->
    <script src="assets/js/bootstrap.js" type="text/javascript"></script>
    <!-- DATATABLE -->
    <script src="assets/plugins/datatables/bootstrap.bundle.js" type="text/javascript"></script>
    <script src="assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap5.js" type="text/javascript"></script>



    <script>
    $(document).ready(function() {
      $('#example').DataTable({
        "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
             }
      });
    });
    </script>

    <script src="assets/js/validaciones.js" type="text/javascript"></script>
   
</body>
</html>
