

<?php  

if (isset($_GET['id_consulta'])) { 


  $n_consulta = $_GET['id_consulta'];
   $query = mysqli_query($mysqli, "SELECT * FROM consulta
                                            AS
                                            c,
                                            medico
                                            AS
                                            m,
                                            paciente
                                            AS
                                            p,
                                            exa_fisico
                                            AS
                                            e
                                            WHERE
                                            c.id_doc_fk = m.id_medico
                                            AND
                                            c.id_pa_fk = p.id_paciente
                                            AND
                                            c.n_consulta = e.id_consul_fk
                                            AND
                                            c.n_consulta = '$n_consulta'
                                            ") 
                                      or die('error: '.mysqli_error($mysqli));
   $data  = mysqli_fetch_assoc($query);

?>

<div class="container">
 
      <div class="header mt-3 d-flex justify-content-between align-items-center">
        <p><i class="fa fa-edit icon-title"></i>Diagnostico</p>

        <div class="list-group list-group-horizontal min-nav pull-right">
            <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=start"> Consultas</a></li>
            <li class="active"> Registrar </li>
          </div>
     </div> 

     <div class="row align-items-stretch justify-content-center no-gutters mt-5 mb-3">
      <div class="col-md-10">
        <div class="form h-100 contact-wrap p-5">
          <h3 class="text-center">Datos Personales del Paciente</h3>

        <form method="POST" action="modules/diagnostico/proses.php?act=insert" id="contactForm" name="contactForm" onsubmit="return validar_diag()" >

          <input type="hidden" name="id_paciente" value="<?php echo $data['id_paciente'] ?>">

          <input type="hidden" name="n_consulta" value="<?php echo $data['n_consulta'] ?>">

          <div class="row">
            <div class="col-md-12 form-group mb-3">
                <label for="hc" class="col-form-label">Numero de Historia</label>
                <input type="text" class="form-control" id="hc"  value="<?php echo $data['n_hc'] ?>" readonly>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ap_p" class="col-form-label">Apellido Paterno</label>
                <input type="text" class="form-control" name="ap_p" id="ap_p"  value="<?php echo $data['apellido_p'] ?>" readonly>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="ap" class="col-form-label">Apellido Materno</label>
                <input type="text" class="form-control" name="ap_m" id="ap" value="<?php echo $data['apellido_m'] ?>" readonly>
              </div>
            </div>


            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="name" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $data['nombre'] ?>" readonly >
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="ci" class="col-form-label">Cedula</label>
                <input type="text" class="form-control" name="ci" id="ci" value='<?php echo $data ['cedula_p']?>' readonly>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="fecha_n" class="col-form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_n" id="fecha_n" value='<?php echo $data ['f_nacimiento'] ?>' readonly>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="edad" class="col-form-label">Edad</label>
                <input type="text" class="form-control" name="edad" id="edad"  value='<?php echo $data ['edad']?>' readonly>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ocu_p" class="col-form-label">Ocupacion</label>
                <input type="text" class="form-control" name="ocu_p" id="ocu_p"  value='<?php echo $data ['ocupacion'] ?>' readonly>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="estado_c" class="col-form-label">Estado Civil</label>
                <input type="text" class="form-control" name="estado_c" id="estado_c"  value='<?php echo $data ['estado_civil'] ?>' readonly>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="reci" class="col-form-label">Residencia</label>
                <input type="text" class="form-control" name="reci" id="reci"  value='<?php echo $data ['residencia'] ?>' readonly>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="tf" class="col-form-label">Telefono</label>
                <input type="text" class="form-control" name="tf" id="tf" value='<?php echo $data ['telefono']?>' readonly>
              </div>
            </div>

            <hr>
            <h3 class="text-center">Examen Fisico</h3>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="ap" class="col-form-label">Presion Arterial</label>
                <input type="text" class="form-control" name="p_a" id="ap"  value='<?php echo $data ['presion']?>' readonly>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="name" class="col-form-label">Temperatura</label>
                <input type="text" class="form-control" name="temp" id="name" value='<?php echo $data ['temperatura']?>' readonly>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="fr" class="col-form-label">Frecuencia Respiratoria</label>
                <input type="text" class="form-control" name="fr" id="fr"  value='<?php echo $data ['f_respira']?>' readonly>
              </div>
              
              <div class="col-md-6 form-group mb-3">
                <label for="fc" class="col-form-label">Frecuencia Cardiaca</label>
                <input type="text" class="form-control" name="fc" id="fc" value='<?php echo $data ['f_cardiaca']?>' readonly>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="alt" class="col-form-label">Altura</label>
                <input type="text" class="form-control" name="alt" id="alt"  value='<?php echo $data ['altura']?>' readonly>
              </div>
              
              <div class="col-md-6 form-group mb-3">
                <label for="peso" class="col-form-label">Peso</label>
                <input type="text" class="form-control" name="peso" id="peso" value='<?php echo $data ['peso']?>' readonly>
              </div>
            </div>

            <hr>
            <h3 class="text-center">Antecedentes Familiares</h3>
             <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="pariente" class="col-form-label">Pariente</label>
                <input type="text" class="form-control" onkeyup="this.value=Text(this.value)" name="pariente" id="pariente" >
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="enfermedad" class="col-form-label">Enfermedad</label>
                <input type="text" class="form-control" onkeyup="this.value=Text(this.value)" name="enfermedad" id="enfermedad" >
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 form-group mb-3">
                <label for="" class="col-form-label">Descripcion</label>
                <textarea class="form-control" id="descri_a" onkeyup="this.value=Text(this.value)" name="descri_a"></textarea>
              </div>
            </div>


            <hr>
            <h3 class="text-center">Enfermedades que Padezca</h3>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="resp" class="col-form-label">Respiratoria</label>
                <input type="text" class="form-control" onkeyup="this.value=Text(this.value)" name="resp" id="resp" >
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="gi" class="col-form-label">Gastrointestinal</label>
                <input type="text" class="form-control" onkeyup="this.value=Text(this.value)" name="gi" id="gi" >
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="neuro" class="col-form-label">Neurologico</label>
                <input type="text" class="form-control" onkeyup="this.value=Text(this.value)" name="neuro" id="neuro" >
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="hemato" class="col-form-label">Hematologico</label>
                <input type="text" class="form-control" onkeyup="this.value=Text(this.value)" name="hemato" id="hemato" >
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="aler" class="col-form-label">Alergico</label>
                <input type="text" class="form-control" onkeyup="this.value=Text(this.value)" name="aler" id="aler" >
              </div>
            </div>
            

            <hr>
            <h3 class="text-center">Habitos</h3>
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Alcohol</label>
                <select class="form-select" aria-label="Default select example" id="alco" name="alco">
                  <option value="">Sleccione</option>
                  <option value="Frecuentemente">Frecuentemente</option>
                  <option value="Regularmente">Regularmente</option>
                  <option value="Nunca">Nunca</option>
                </select>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Drogas</label>
                <select class="form-select" aria-label="Default select example" id="dro" name="dro">
                  <option value="">Sleccione</option>
                  <option value="Frecuentemente">Frecuentemente</option>
                  <option value="Regularmente">Regularmente</option>
                  <option value="Nunca">Nunca</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Tabaco</label>
                <select class="form-select" aria-label="Default select example" id="taba" name="taba">
                  <option value="">Sleccione</option>
                  <option value="Frecuentemente">Frecuentemente</option>
                  <option value="Regularmente">Regularmente</option>
                  <option value="Nunca">Nunca</option>
                </select>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Sueño</label>
                <select class="form-select" aria-label="Default select example" id="sue" name="sue">
                  <option value="">Sleccione</option>
                  <option value="7-8 hr">7-8 hr</option>
                  <option value="5-6 hr">5-6 hr</option>
                  <option value="2-4 ht">2-4 ht</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Vida Sexual</label>
                <select class="form-select" aria-label="Default select example" id="vs" name="vs">
                  <option value="">Sleccione</option>
                  <option value="Frecuentemente">Frecuentemente</option>
                  <option value="Regularmente">Regularmente</option>
                  <option value="Nunca">Nunca</option>
                </select>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Alimentacion</label>
                <select class="form-select" aria-label="Default select example" id="al" name="al">
                  <option value="">Sleccione</option>
                  <option value="3-5">3-5 comidas</option>
                  <option value="menos de 3">menos de 3 comidas</option>
                  <option value="mas de 5">mas de 5 comidas</option>
                </select>
              </div>
            </div>

            <hr>
            <h3 class="text-center">Diagnostico</h3>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Motivo de la Consulta</label>
                <textarea class="form-control" id="mc" name="motivo" readonly><?php echo $data['motivo'] ?></textarea>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Sintomas Especificamente</label>
                <textarea class="form-control" onkeyup="this.value=TextNumber(this.value)" id="esp" name="esp"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Enfermedad</label>
                <textarea class="form-control" onkeyup="this.value=Text(this.value)" id="enf" name="enf"></textarea>
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Tratamiento</label>
                <textarea class="form-control" onkeyup="this.value=Text(this.value)" id="tra" name="tra"></textarea>
              </div>
            </div>


            <div class="row">
          
              <div class="col-md-12 form-group mb-3">
                <label for="budget" class="col-form-label">Examenes Recomendados</label>
                <textarea class="form-control" onkeyup="this.value=Text(this.value)" id="er" name="er"></textarea>
              </div>
            </div>

            <hr>
            <h3 class="text-center">Receta Medica</h3>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="medicamento" class="col-form-label">Medicamento</label>
                <input type="text" class="form-control" name="medicamento" id="medicamento" onkeyup="this.value=TextNumber(this.value)">
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="presentacion" class="col-form-label">Presentacion</label>
                <input type="text" class="form-control" name="presentacion" onkeyup="this.value=TextNumber(this.value)" id="presentacion" >
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="dosis" class="col-form-label">Dosis</label>
                <input type="text" class="form-control" name="dosis" onkeyup="this.value=Numeros(this.value)" id="dosis" >
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="duracion" class="col-form-label">Duracion</label>
                <input type="text" class="form-control" onkeyup="this.value=TextNumber(this.value)" name="duracion" id="duracion" >
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="cantidad" class="col-form-label">Cantidad</label>
                <input type="text" class="form-control" name="cantidad" onkeyup="this.value=Numeros(this.value)" id="cantidad" >
              </div>

              <div class="col-md-6 form-group mb-3">
                <label for="budget" class="col-form-label">Forma de empleo</label>
                <textarea class="form-control" id="empleo"  onkeyup="this.value=TextNumber(this.value)" name="empleo"></textarea>
              </div>

              
            </div>

            <div class="col-sm-12 text-center mb-3">
              <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
              <a href="?module=start" class="btn btn-light btn-reset">Cancelar</a>
            </div>

            <div class="alert alert-danger" role="alert" id="mensaje"></div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php
}
