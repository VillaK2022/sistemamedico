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
        Schema::create('examen_fisicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('parterial_exfisico')->nullable()->comment('parterial_exfisico');
            $table->integer('temperatura_exfisico')->nullable()->comment('temperatura_exfisico');
            $table->integer('frespiratoria_exfisico')->nullable()->comment('frespiratoria_exfisico');
            $table->integer('fcardiaca_exfisico')->nullable()->comment('fcardiaca_exfisico');
            $table->integer('peso_exfisico')->nullable()->comment('peso_exfisico');
            $table->integer('altura_exfisico')->nullable()->comment('altura_exfisico');
            $table->timestamp('fechaeliminacion')->nullable()->comment('Borrado logico');
            $table->integer('id_paciente')->nullable()->comment('Foraneapaciente');
            $table->integer('id_usuario_eliminacion')->nullable()->comment('Usuarioeliminacion');
            // $table->foreign('id_paciente')->references('id')->on('pacientes');
            // $table->foreign('id_usuario_eliminacion')->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen_fisicos');
    }
};
