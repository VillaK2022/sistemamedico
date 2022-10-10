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
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente')->nullable()->comment('id_paciente_receta');
            // $table->foreign('id_paciente')->references('id')->on('paciente');
            $table->unsignedBigInteger('id_medico')->nullable()->comment('id_medico_receta');
            // $table->foreign('id_medico')->references('id')->on('medico');
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
        Schema::dropIfExists('recetas');
    }
};
