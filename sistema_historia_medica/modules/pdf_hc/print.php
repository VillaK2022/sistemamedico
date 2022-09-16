<?php

session_start();
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}else{

	require('../../assets/plugins/fpdf/fpdf.php');
	require_once "../../config/database.php";

	 	$id = $_GET['n_hc'];
	 	$fecha_c = $_GET['fecha'];

	   	$query = mysqli_query($mysqli, "SELECT * FROM
	                                            paciente
	                                            AS
	                                            p,
	                                            habito
	                                            AS
	                                            h,
	                                            antc_fami
	                                            AS
	                                            a,
	                                            enfermedades
	                                            AS 
	                                            en,
	                                            consulta
	                                            AS
	                                            c, 
	                                            exa_fisico
	                                            AS
	                                            e,
	                                            medico
	                                            AS
	                                            m,
	                                            diagnostico
	                                            AS
	                                            d,
	                                            receta
	                                            AS
	                                            re,
	                                            medico_paciente
	                                            AS 
	                                            mp
	                                            WHERE
	                                            p.n_hc = '$id'
	                                            AND
	                                            h.id_pa_fk = p.id_paciente
	                                            AND
	                                            a.id_pa_fk = p.id_paciente
	                                            AND
	                                            en.id_pa_fk = p.id_paciente
	                                            AND
	                                            c.id_doc_fk = m.id_medico
	                                            AND
	                                            c.id_pa_fk = p.id_paciente
	                                            AND
	                                            e.id_consul_fk = c.n_consulta
	                                            AND
	                                            d.consulta_fk = c.n_consulta
	                                            AND
	                                            re.diagnostico_fk = d.id_diagnostico
	                                            AND
	                                            c.fecha_r = '$fecha_c'
	                                            ") 
	                                      or die('error: '.mysqli_error($mysqli));
	     $data  = mysqli_fetch_assoc($query);

	     $rows  = mysqli_num_rows($query);


	if ($_GET['fecha'] == '' || $rows === 0) {

		 header("location: ../../main.php?module=historial&alert=1");
		 
	}else{
	 

		$fecha = $data['f_nacimiento'];
		$exp = explode('-',$fecha);
		$fecha2 = $exp[2]."-".$exp[1]."-".$exp[0];

		// Creación del objeto de la clase heredada
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',12);
		//header
		$pdf->Image('../../img/logo.png',15,8,40);
		$pdf->Cell(165);
		$pdf->Cell(25,15,utf8_decode($data['n_hc']), 1,0);
		$pdf->Ln(20);
		$pdf->Cell(80);
		$pdf->Cell(30,20,'Historia Clinica',0,1,'C');
		$pdf->Line(10,45,200,45);

		//contenido Medico
		$pdf->Cell(85);
		$pdf->Cell(50,5,utf8_decode('Medico/ca'), 0,1);
		$pdf->Ln(10);
	    $pdf->Cell(50,5,utf8_decode('Apellido y Nombre'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['apellido'].' '.$data['nombre_doc']), 0,1);
	    $pdf->Cell(50,5,utf8_decode('Especialidad'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['especialidad']), 0,1);
	    $pdf->Line(10,80,200,80);
	    $pdf->Ln(10);
	   
	   	//contenido paciente
	   	$pdf->Cell(70);
		$pdf->Cell(50,5,utf8_decode('Datos personales del Paciente'), 0,1);
		$pdf->Ln(10);

		$pdf->Cell(50,5,utf8_decode('Apellidos y Nombre'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['apellido_p'].' '.$data['apellido_m'].' '.$data['nombre']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Cedula'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['cedula']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Fecha de Nacimiento'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$fecha2), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Edad'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['edad']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Ocupacion'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['ocupacion']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Estado Civil'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['estado_civil']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Residencia'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['residencia']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Telefono'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['telefono']), 0,1);
	    
	    $pdf->Line(10,125,200,125);
	    $pdf->Ln(10);

	    $pdf->Cell(85);
		$pdf->Cell(50,5,utf8_decode('Examen Fisico'), 0,1);
		$pdf->Ln(10);

		$pdf->Cell(50,5,utf8_decode('Presion Arterial'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['presion']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Temperatura'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['temperatura']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Frecuencia Respiratoria'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['f_respira']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Frecuencia Cardiaca'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['f_cardiaca']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Altura'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['altura']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Peso'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['peso']), 0,1);


	    $pdf->Line(10,165,200,165);
	    $pdf->Ln(10);

	    $pdf->Cell(74);
		$pdf->Cell(50,5,utf8_decode('Antecedentes Familiares'), 0,1);
		$pdf->Ln(10);

		$pdf->Cell(50,5,utf8_decode('Pariente'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['pariente']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Enfermedad'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['enfermedad']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Descripcion:'), 0,1);
	    $pdf->Cell(185,10,utf8_decode($data['descripcion']), 1,1);


	    $pdf->Line(10,210,200,210);
	    $pdf->Ln(10);

	    $pdf->Cell(74);
		$pdf->Cell(50,5,utf8_decode('Enfermedades que Padezca'), 0,1);
		$pdf->Ln(10);

		$pdf->Cell(50,5,utf8_decode('Respiratoria'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['respiratoria']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Gastrointestinal'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['gastro_intestinal']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Neurologico'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['neurologico']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Hematologico'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['hematologico']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Alergico'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['alergia']), 0,1);

	    $pdf->Line(10,250,200,250);
	    $pdf->Ln(35);


	    $pdf->Cell(93);
		$pdf->Cell(50,5,utf8_decode('Habitos'), 0,1);
		$pdf->Ln(10);

		$pdf->Cell(50,5,utf8_decode('Alcohol'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['alcohol']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Drogas'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['gastro_intestinal']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Tabaco'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['tabaco']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Sueño'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['sueno']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Vida Sexual'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['vida_sexual']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(55,5,utf8_decode('Alimentacion'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['alimentacion']), 0,1);


	    $pdf->Line(10,50,200,50);
	    $pdf->Ln(13);

	    $pdf->Cell(90);
		$pdf->Cell(50,5,utf8_decode('Diagnostico'), 0,1);
		$pdf->Ln(10);

		$pdf->Cell(50,5,utf8_decode('Motivo de la Consulta'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['motivo']), 0,1);

	    $pdf->Ln(10);
	    $pdf->Cell(50,5,utf8_decode('Sintomas Especificamente:'), 0,1);
	    $pdf->Ln(5);
	    $pdf->Cell(185,10,utf8_decode($data['descrip_sintomas']), 0,1);

	    $pdf->Ln(10);

	    $pdf->Cell(50,5,utf8_decode('Enfermedad:'), 0,1);
	    $pdf->Ln(5);
	    $pdf->Cell(185,10,utf8_decode($data['enfermedad']), 1,1);
	    $pdf->Ln(10);
	    $pdf->Cell(50,5,utf8_decode('Tratamiento:'), 0,1);
	    $pdf->Ln(5);
	    $pdf->Cell(185,10,utf8_decode($data['tratamiento']), 1,1);
	    $pdf->Ln(5);
	    $pdf->Cell(50,5,utf8_decode('Examenes Recomendados:'), 0,1);
	    $pdf->Ln(5);
	    $pdf->Cell(185,10,utf8_decode($data['examenes']), 1,1);

	    $pdf->Line(10,190,200,190);
	    $pdf->Ln(10);

	    $pdf->Cell(85);
		$pdf->Cell(50,5,utf8_decode('Receta Medica'), 0,1);
		$pdf->Ln(10);

		$pdf->Cell(50,5,utf8_decode('Medicamento'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['medicamento']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(40,5,utf8_decode('Presentacion'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['presentacion']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Dosis'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['dosis']), 0,0);
	    $pdf->Cell(10,5,utf8_decode('|'), 0,0);
	    $pdf->Cell(40,5,utf8_decode('Duracion'), 0,0);
	    $pdf->Cell(40,5,utf8_decode(': '.$data['duracion']), 0,1);

	    $pdf->Cell(50,5,utf8_decode('Cantidad'), 0,0);
	    $pdf->Cell(50,5,utf8_decode(': '.$data['cantidad']), 0,1);
	   	$pdf->Ln(5);
	    $pdf->Cell(40,5,utf8_decode('Forma de empleo:'), 0,1);
	    $pdf->Ln(3);
	    $pdf->Cell(185,10,utf8_decode($data['uso']), 1,1);

	    $pdf->Line(10,50,200,50);
	    $pdf->Ln(13);
	   
		$pdf->Output();
	}
}
	
?>