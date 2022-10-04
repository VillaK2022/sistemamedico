<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            //CAMPOS

            $table->id('nro_consulta');
            $table->string('motivo_consulta',100);
            $table->string('estado_consulta',20);
            $table->unsignedBigInteger('id_medico')->comment('Foranea del medico');
            $table->unsignedBigInteger('id_paciente')->comment('Foranea del paciente');
            //FECHAS (CREATE Y UPDATE) y Fecha Registro
            $table->date('fechareg_consulta');
            $table->timestamps();
            //LLAVES FORANEAS

            // $table->foreign('id_medico')->references('id')->on('medicos');
            // $table->foreign('id_paciente')->references('id')->on('pacientes');

            $table->foreign('id_medico')->references('id')->on('medicos');
            $table->foreign('id_paciente')->references('id')->on('pacientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
};
