<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');

            $table->integer('medico_id')->unsigned()->default(5);
            $table->foreign('medico_id')->references('id')->on('users');

            $table->integer('especialidad_id')->unsigned();
            $table->foreign('especialidad_id')->references('id')->on('especialidades');

            $table->enum('status',['Asignada','pendiente','Vista'])->default('pendiente');

            $table->string('hota')->nullable();
            $table->text('observaciones');
            $table->date('fecha')->nullable();

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
        Schema::dropIfExists('citas');
    }
}
