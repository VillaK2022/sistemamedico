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
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->string('enfermedad_diagnostico',250);
            $table->string('sinstomas_diagnostico',250);
            $table->string('tratamiento_diagnostico',250);
            $table->string('nro_consulta',250);
            $table->string('examenes_diagnostico',250);
            $table->unsignedBigInteger('id_enfermedad')->nullable()->comment('Foranea de enfermedad');
            $table->unsignedBigInteger('id_consulta')->nullable()->comment('Foranea de consulta');
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
        Schema::dropIfExists('diagnosticos');
    }
};
