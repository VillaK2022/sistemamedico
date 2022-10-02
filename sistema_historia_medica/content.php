<?php
require_once "config/database.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {

	if ($_GET['module'] == 'start') {
		include "modules/start/view.php";
	}

    elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}

	elseif ($_GET['module'] == 'doc') {
		include "modules/doctor/view.php";
	}

	elseif ($_GET['module'] == 'form_doc') {
		include "modules/doctor/form.php";
	}

	elseif ($_GET['module'] == 'enf') {
		include "modules/enfermera/view.php";
	}

	elseif ($_GET['module'] == 'form_enf') {
		include "modules/enfermera/form.php";
	}

	elseif ($_GET['module'] == 'paciente') {
		include "modules/paciente/view.php";
	}

	elseif ($_GET['module'] == 'form_pac') {
		include "modules/paciente/form.php";
	}

	elseif ($_GET['module'] == 'cita') {
		include "modules/cita/view.php";
	}

	elseif ($_GET['module'] == 'form_cita') {
		include "modules/cita/form.php";
	}

	elseif ($_GET['module'] == 'consulta') {
		include "modules/consulta/view.php";
	}

	elseif ($_GET['module'] == 'form_consulta') {
		include "modules/consulta/form.php";
	}

	elseif ($_GET['module'] == 'form_diagn') {
		include "modules/diagnostico/form.php";
	}

	elseif ($_GET['module'] == 'historial') {
		include "modules/historial_clinico/view.php";
	}
	elseif ($_GET['module'] == 'hc') {
		include "modules/historial_clinico/historial.php";
	}

	elseif ($_GET['module'] == 'pdf_enf') {
		include "modules/pdf_enfermera/print.php";
	}
	elseif ($_GET['module'] == 'pdf_med') {
		include "modules/pdf_doctor/print.php";
	}
	elseif ($_GET['module'] == 'pdf_hc') {
		include "modules/pdf_enfermera/print.php";
	}
	
	elseif ($_GET['module'] == 'logout') {
		include "modules/logout/logout.php";
	}
}
?>