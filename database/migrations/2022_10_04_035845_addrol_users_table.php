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
        Schema::table('users', function(Blueprint $table){
            $table->integer('rol')->default(3)->comment('rol del usuario 1=admin, 2=medico, 3=enfermero');
        });
        Schema::table('citas', function(Blueprint $table){
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
       Schema::table('users', function(Blueprint $table){
           $table->dropColumn('rol');
       });
       Schema::table('citas', function(Blueprint $table){
        $table->dropForeign('citas_id_medico_foreign');
        $table->dropForeign('citas_id_paciente_foreign');
    });
    }
};
