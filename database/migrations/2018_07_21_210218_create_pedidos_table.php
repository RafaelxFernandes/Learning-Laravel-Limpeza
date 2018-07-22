<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unsigned()->unique();
            $table->integer('quantidade')->unsigned();
            $table->string('data');
            $table->integer('produto_id')->unsigned()->nullable();
            $table->integer('produto_quantidade')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
