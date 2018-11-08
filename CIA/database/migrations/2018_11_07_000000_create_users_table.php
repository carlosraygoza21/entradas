<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('huella')->unsigned();
            $table->string('password');
            $table->tinyInteger('eliminado')->unsigned();
            $table->tinyInteger('es_coordi')->unsigned();
            $table->integer('id_perfil')->unsigned();
            $table->rememberToken();
            $table->timestamps();

             $table->foreign('id_perfil')
                   ->references('id')->on('perfiles')
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
        $table->dropForeign('users_id_perfil_foreign');
        Schema::dropIfExists('users');

    }
}
