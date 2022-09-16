const expresiones = {
			ln: /^[a-zA-Z0-9 ]{4,100}$/, // Letras, numeros, guion y guion_bajo
			letras: /^[a-zA-ZÀ-ÿ\s ]{1,50}$/, // Letras y espacios, pueden llevar acentos.
			correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
			numero: /^([0-9])*$/}
			;

function Numeros(string){//Solo numeros
    var out = '';
    var filtro = '1234567890';//Caracteres validos
	
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
             //Se añaden a la salida los caracteres validos
	     out += string.charAt(i);
	
    //Retornar valor filtrado
    return out;
} 

function Text(string){//solo letras
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ';//Caracteres validos
	
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}

function TextNumber(string){//solo letras
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890 ';//Caracteres validos
	
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}

function TextNumberEsp(string){//solo letras
    var out = '';
    //Se añaden las letras validas
    var filtro = '1234567890/.';//Caracteres validos
	
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}



function validar_user(){

    var username,

	 	pass,

	 	ci,

	 	cedula,

	 	permisos

	 	;

	username = document.getElementById("username").value;

	pass = document.getElementById("pass").value;

	ci = document.getElementById("ci").value;

	permiso = document.getElementById("permiso").value;


	var mensaje = document.getElementById("mensaje");

	let array = [username,pass,ci,permiso];

	for (var i=0; i<array.length; i++) {
		
		if (array[i] == "") {
			mensaje.style.display = 'block';
			mensaje.innerHTML='Tiene que rellenar todos los campos';
			return false;

		}
	}

}








function validar_medico(){

    var ap,

	 	name,

	 	ci,

	 	tf,

	 	espe,

	 	ubica

	 	;

	ap = document.getElementById("ap").value;

	name = document.getElementById("name").value;

	ci = document.getElementById("ci").value;

	tf = document.getElementById("tf").value;

	espe = document.getElementById("espe").value;

	ubica = document.getElementById("ubica").value;




	var mensaje = document.getElementById("mensaje");

	let array = [ap,name,ci,tf,espe,ubica];

	for (var i=0; i<array.length; i++) {
		
		if (array[i] == "") {
			mensaje.style.display = 'block';
			mensaje.innerHTML='Tiene que rellenar todos los campos';
			return false;

		}
	}

}






function validar_enfermera(){

    var ap,

	 	name,

	 	ci,

	 	tf

	 	;

	ap = document.getElementById("ap").value;

	name = document.getElementById("name").value;

	ci = document.getElementById("ci").value;

	tf = document.getElementById("tf").value;





	var mensaje = document.getElementById("mensaje");

	let array = [ap,name,ci,tf];

	for (var i=0; i<array.length; i++) {
		
		if (array[i] == "") {
			mensaje.style.display = 'block';
			mensaje.innerHTML='Tiene que rellenar todos los campos';
			return false;

		}
	}

}












function validar_paciente(){

    var 

	 	ap_p,

	 	ap,

	 	name,

	 	ci,

	 	fecha_n,

	 	edad,

	 	ocu_p,

	 	estado_c,

	 	reci,

	 	tf

	 	;

	ap_p = document.getElementById("ap_p").value;

	ap = document.getElementById("ap").value;


	name = document.getElementById("name").value;


	ci = document.getElementById("ci").value;

	fecha_n = document.getElementById("fecha_n").value;

	edad = document.getElementById("edad").value;

	ocu_p = document.getElementById("ocu_p").value;


	estado_c = document.getElementById("estado_c").value;

	reci = document.getElementById("reci").value;

	tf = document.getElementById("tf").value;



	var mensaje = document.getElementById("mensaje");

	let array = [ap_p,ap,name,ci,fecha_n,edad,ocu_p,estado_c,reci,tf];

	for (var i=0; i<array.length; i++) {
		
		if (array[i] == "") {
			mensaje.style.display = 'block';
			mensaje.innerHTML='Tiene que rellenar todos los campos';
			return false;

		}
	}

}





function validar_cita(){

    var fecha,

	 	mc,

	 	paciente,

	 	doc

	 	;

	fecha = document.getElementById("fecha").value;

	mc = document.getElementById("mc").value;

	paciente = document.getElementById("paciente").value;

	doc = document.getElementById("doc").value;





	var mensaje = document.getElementById("mensaje");

	let array = [fecha,mc,paciente,doc];

	for (var i=0; i<array.length; i++) {
		
		if (array[i] == "") {
			mensaje.style.display = 'block';
			mensaje.innerHTML='Tiene que rellenar todos los campos';
			return false;

		}
	}

}





function validar_fecha(){

    var fecha
	 	;

	fecha = document.getElementById("fecha").value;


	var mensaje = document.getElementById("mensaje");

	let array = [fecha];

	for (var i=0; i<array.length; i++) {
		
		if (array[i] == "") {
			mensaje.style.display = 'block';
			mensaje.innerHTML='Tiene que seleccionar una fecha';
			return false;

		}
	}

}








function validar_consulta(){

    var motivo,
    	medico,
    	ap,
    	temp,
    	fr,
    	fc,
    	alt,
    	peso
	 	;

	motivo = document.getElementById("motivo").value;

	medico = document.getElementById("medico").value;

	ap = document.getElementById("ap").value;

	temp = document.getElementById("temp").value;

	fr = document.getElementById("fr").value;

	fc = document.getElementById("fc").value;

	alt = document.getElementById("alt").value;

	peso = document.getElementById("peso").value;

	var mensaje = document.getElementById("mensaje");

	let array = [motivo,medico,ap,temp,fr,fc,alt,peso];

	for (var i=0; i<array.length; i++) {
		
		if (array[i] == "") {
			mensaje.style.display = 'block';
			mensaje.innerHTML='Tiene que rellenar todos los campos';
			return false;

		}
	}

}






function validar_diag(){

    var pariente,
    	enfermedad,
    	descri_a,
    	resp,
    	gi,
    	neuro,
    	hemato,
    	aler,




    	alco,

    	dro,

    	taba,

    	sue,

    	vs,

    	al,



    	esp,

    	enf,

    	tra,
    	
    	er,



    	medicamento,

    	presentacion,

    	dosis,

    	duracion,

    	cantidad,

    	empleo

	 	;

	pariente = document.getElementById("pariente").value;

	enfermedad = document.getElementById("enfermedad").value;

	descri_a = document.getElementById("descri_a").value;

	resp = document.getElementById("resp").value;

	gi = document.getElementById("gi").value;

	neuro = document.getElementById("neuro").value;

	hemato = document.getElementById("hemato").value;

	aler = document.getElementById("aler").value;


	alco = document.getElementById("alco").value;

	dro = document.getElementById("dro").value;

	taba = document.getElementById("taba").value;

	sue = document.getElementById("sue").value;

	vs = document.getElementById("vs").value;

	al = document.getElementById("al").value;




	esp = document.getElementById("esp").value;

	enf = document.getElementById("enf").value;

	tra = document.getElementById("tra").value;

	er = document.getElementById("er").value;



	medicamento = document.getElementById("medicamento").value;

	presentacion = document.getElementById("presentacion").value;

	dosis = document.getElementById("dosis").value;

	duracion = document.getElementById("duracion").value;

	cantidad = document.getElementById("cantidad").value;

	empleo = document.getElementById("empleo").value;




	var mensaje = document.getElementById("mensaje");

	let array = [pariente,enfermedad,descri_a,resp,gi,neuro,hemato,aler,alco,dro,taba,sue,vs,al,esp,enf,tra,medicamento,presentacion,dosis,duracion,cantidad,

    	empleo];

	for (var i=0; i<array.length; i++) {
		
		if (array[i] == "") {
			mensaje.style.display = 'block';
			mensaje.innerHTML='Tiene que rellenar todos los campos';
			return false;

		}
	}

}





