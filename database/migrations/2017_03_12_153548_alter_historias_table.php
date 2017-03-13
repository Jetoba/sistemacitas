<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterHistoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historias', function (Blueprint $table) {
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('users')->delete('cascade');

            $table->integer('medico_id')->unsigned();
            $table->foreign('medico_id')->references('id')->on('users')->delete('cascade');

            $table->integer('cita_id')->unsigned();
            $table->foreign('cita_id')->references('id')->on('citas')->delete('cascade');

            $table->integer('especialidad_id')->unsigned();
            $table->foreign('especialidad_id')->references('id')->on('especialidades')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historias', function (Blueprint $table) {
            //
        });
    }
}
