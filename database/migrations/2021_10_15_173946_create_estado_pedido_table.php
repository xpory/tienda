<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_pedido', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30)->comment('nombre que se le asigna al ');
            $table->string('descripcion', 100)->comment('descripcion para entender de que se trata el estado');;
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
        Schema::dropIfExists('estado_pedido');
    }
}
