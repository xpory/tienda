<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_proveedor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_proveedor')->constrained('proveedor', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('proveedor');
            $table->foreignId('id_detalle_pedido_proveedor')->constrained('detalle_pedido_proveedor', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('detalle de pedido del proveedor');
            $table->date('fecha_solicitud')->comment('fecha en que se solicito el pedido');
            $table->foreignId('id_estado_pedido')->constrained('estado_pedido', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('estado del pedido');
            $table->unsignedDecimal('total', 11, 2)->comment('total de la compra al proveedor');
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
        Schema::dropIfExists('pedidos_proveedor');
    }
}
