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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('apellidop_paciente',50);
            $table->string('apellidom_paciente',50);
            $table->string('nombre_paciente',50);
            $table->timestamps('fechanac_paciente');
            $table->string('ecivil_paciente',50);
            $table->string('tlf_paciente');
            $table->string('ocupacion_paciente',50);
            $table->string('resid_paciente',50);
            $table->integer('nhistoria_paciente');
            $table->integer('cedula_paciente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
};
