<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('users')->delete('cascade');;

            $table->unsignedInteger('medico_id')->default(5);
            $table->foreign('medico_id')->references('id')->on('users')->delete('cascade');;

            $table->unsignedInteger('especialidad_id');
            $table->foreign('especialidad_id')->references('id')->on('especialidades')->delete('cascade');;

            $table->unique(['paciente_id','especialidad_id','fecha']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            //
        });
    }
}
