<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudDeVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_de_ventas', function (Blueprint $table) 
		{
            $table->increments('id');
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
			$table->string('UnidadSolicitante');
			$table->string('NombreBienServicio');
			$table->string('DetalleBienServicio');
			$table->string('UnidadDeMedida');
			$table->string('CantidadRequerida');
			$table->string('JustificacionBienServicio');
			$table->string('Observaciones');
			$table->string('fechaAproximada');
			$table->string('estadoSolicitud')->default('Pendiente');
			$table->string('ObservacionEstado')->default('Sin Observacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_de_ventas');
    }
}
