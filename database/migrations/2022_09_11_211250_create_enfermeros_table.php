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
        Schema::create('enfermeros', function (Blueprint $table) {
            $table->id();
            $table->integer('id_enfermera');
            $table->string('apellidop_enfermera',50);
            $table->string('apellidom_enfermera',50);
            $table->string('nombre_enfermera',50);
            $table->integer('cedula_enfermera');
            $table->integer('tlf_enfermera');
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
        Schema::dropIfExists('enfermeros');
    }
};
