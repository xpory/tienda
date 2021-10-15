<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_encabezado_venta')->constrained('encabezado_venta', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('encabezado de la venta');
            $table->foreignId('id_articulo')->constrained('articulo', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('articulo');
            $table->unsignedInteger('cantidad')->comment('cantidad de articulos');
            $table->unsignedDouble('subtotal', 11, 2)->comment('subtotal de articulos, cantidad por el precio del articulo');
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
        Schema::dropIfExists('detalle_venta');
    }
}
