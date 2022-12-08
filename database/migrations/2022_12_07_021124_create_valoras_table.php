<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('status');
            
            $table->unsignedBigInteger('user_id'); // UNSIGNED BIG INT
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            
            $table->unsignedBigInteger('libro_id'); // UNSIGNED BIG INT
            $table->foreign('libro_id')->references('id')->on('libros')->onUpdate('cascade');
            
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valoras');
    }
}
