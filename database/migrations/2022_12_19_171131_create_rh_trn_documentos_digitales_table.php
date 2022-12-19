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
        Schema::create('rh_trn_documentos_digitales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_documento_id');
            $table->foreign('tipo_documento_id')->references('id')->on('rh_cl_tipos_documentos');
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('rh_trn_personas');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('id_registro_tabla');
            $table->string('enlace', 255);
            $table->string('nombre_archivo', 255);
            $table->boolean('edicion')->default(1);
            $table->string('estado', 50);
            $table->boolean('vigente')->default(1);
            $table->string('motivo_solicitud', 255);
            $table->string('observacion', 255);
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
        Schema::dropIfExists('rh_trn_documentos_digitales');
    }
};
