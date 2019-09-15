<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecomentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {

            $table->bigIncrements('idcomentarios');

            $table->string('comentario')->nullable();

            $table->bigInteger('user_id')->unsigned()->nullable();
            
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->bigInteger('idPost')->unsigned()->nullable();    
            
            $table->foreign('idPost')->references('id')->on('posts');
            
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
        Schema::dropIfExists('comentarios');
    }
}
