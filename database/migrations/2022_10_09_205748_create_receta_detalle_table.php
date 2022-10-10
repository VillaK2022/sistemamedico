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
        Schema::create('receta_detalles', function (Blueprint $table) {
            $table->id();
            $table->string('medicamento_receta',250);
            $table->string('presentacion_receta',250);
            $table->string('dosis_receta',250);
            $table->string('duracion_receta',250);
            $table->string('cantidad_receta',250);
            $table->string('uso_receta',250);
            $table->unsignedBigInteger('id_receta')->nullable()->comment('Foranea de receta');
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
        Schema::dropIfExists('receta_detalles');
    }
};
