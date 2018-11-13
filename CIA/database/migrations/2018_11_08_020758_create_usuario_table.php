<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('codigo');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->timestamp('correo_verified_at')->nullable();
            $table->text('huella')->nullable();
            $table->string('password');
            $table->tinyInteger('eliminado')->unsigned();
            $table->tinyInteger('es_coordi')->unsigned();
            $table->integer('id_perfil')->unsigned();
            $table->rememberToken();
            $table->timestamps();

             $table->foreign('id_perfil')
                   ->references('id')->on('perfil')
                   ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
