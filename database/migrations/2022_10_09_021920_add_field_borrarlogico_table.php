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
        Schema::table('medicos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_eliminacion')->nullable()->comment('Usuarioeliminacion');
            $table->foreign('id_usuario_eliminacion')->references('id')->on('users');
            $table->timestamp('fechaeliminacion')->nullable()->comment('Borrado logico');
        });
        Schema::table('pacientes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_eliminacion')->nullable()->comment('Usuarioeliminacion');
            $table->foreign('id_usuario_eliminacion')->references('id')->on('users');
            $table->timestamp('fechaeliminacion')->nullable()->comment('Borrado logico');
        });
        Schema::table('citas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_eliminacion')->nullable()->comment('Usuarioeliminacion');
            $table->foreign('id_usuario_eliminacion')->references('id')->on('users');
            $table->timestamp('fechaeliminacion')->nullable()->comment('Borrado logico');
        });
        Schema::table('enfermeros', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_eliminacion')->nullable()->comment('Usuarioeliminacion');
            $table->foreign('id_usuario_eliminacion')->references('id')->on('users');
            $table->timestamp('fechaeliminacion')->nullable()->comment('Borrado logico');
        });
        Schema::table('usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_eliminacion')->nullable()->comment('Usuarioeliminacion');
            $table->foreign('id_usuario_eliminacion')->references('id')->on('users');
            $table->timestamp('fechaeliminacion')->nullable()->comment('Borrado logico');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_eliminacion')->nullable()->comment('Usuarioeliminacion');
            $table->foreign('id_usuario_eliminacion')->references('id')->on('users');
            $table->timestamp('fechaeliminacion')->nullable()->comment('Borrado logico');
        });
        Schema::table('consultas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_eliminacion')->nullable()->comment('Usuarioeliminacion');
            $table->foreign('id_usuario_eliminacion')->references('id')->on('users');
            $table->timestamp('fechaeliminacion')->nullable()->comment('Borrado logico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicos', function (Blueprint $table) {
            $table->dropForeign('medicos_id_usuario_eliminacion_foreign');
            $table->dropColumn('id_usuario_eliminacion');
            $table->dropColumn('fechaeliminacion');
        });
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropForeign('pacientes_id_usuario_eliminacion_foreign');
            $table->dropColumn('id_usuario_eliminacion');
            $table->dropColumn('fechaeliminacion');
        });
        Schema::table('citas', function (Blueprint $table) {
            $table->dropForeign('citas_id_usuario_eliminacion_foreign');
            $table->dropColumn('id_usuario_eliminacion');
            $table->dropColumn('fechaeliminacion');
        });
        Schema::table('enfermeros', function (Blueprint $table) {
            $table->dropForeign('enfermeros_id_usuario_eliminacion_foreign');
            $table->dropColumn('id_usuario_eliminacion');
            $table->dropColumn('fechaeliminacion');
        });
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('usuarios_id_usuario_eliminacion_foreign');
            $table->dropColumn('id_usuario_eliminacion');
            $table->dropColumn('fechaeliminacion');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_id_usuario_eliminacion_foreign');
            $table->dropColumn('id_usuario_eliminacion');
            $table->dropColumn('fechaeliminacion');
        });
        Schema::table('consultas', function (Blueprint $table) {
            $table->dropForeign('consultas_id_usuario_eliminacion_foreign');
            $table->dropColumn('id_usuario_eliminacion');
            $table->dropColumn('fechaeliminacion');
        });
    }
};
