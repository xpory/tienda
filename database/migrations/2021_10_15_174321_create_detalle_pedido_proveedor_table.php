<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidoProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedido_proveedor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pedidos_proveedor')->constrained('pedidos_proveedor', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('articulo');
            $table->foreignId('id_articulo')->constrained('articulo', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('articulo');
            $table->unsignedDecimal('precio_unitario', 11, 2)->comment('precio por unidad del articulo');
            $table->unsignedInteger('cantidad')->comment('cantidad de articulos pedidos al proveedor');
            $table->unsignedDecimal('subtotal', 11, 2)->comment('subtotal precio unitario por la cantidad');
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
        Schema::dropIfExists('detalle_pedido_proveedor');
    }
}
