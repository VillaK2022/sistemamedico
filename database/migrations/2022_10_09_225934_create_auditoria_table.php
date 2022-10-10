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
        Schema::create('auditorias', function (Blueprint $table) {
            $table->id();
            $table->integer('accion')->comment('Registro de lo realizado por el usuario, 1=Agregar, 2=Modificar, 3=Eliminar ');
            $table->integer('id_dato')->comment('Se guardara el identificador de la tabla que se modifico, guardo o elimino');
            $table->string('tabla')->comment('Se guardara la tabla a la que accedio el usuario');
            $table->text('modificaciones')->nullable()->comment('registro de modificaciones');
            $table->unsignedBigInteger('id_usuario')->comment('id_usuario_accion');
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
        Schema::dropIfExists('auditorias');
    }
};
