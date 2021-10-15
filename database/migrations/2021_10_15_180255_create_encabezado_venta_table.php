<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncabezadoVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encabezado_venta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empleado')->constrained('empleado', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('empleado');
            $table->foreignId('id_usuario')->constrained('users', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('usuario');
            $table->unsignedInteger('numero_caja')->comment('numero de caja si es compra fija si no se usa la caja online');
            $table->unsignedDecimal('deposito', 11, 2)->comment('cantidad de dinero con la que paga el cliente');
            $table->unsignedDecimal('devolucion', 11, 2)->comment('cantidad de dinero que se le regresa al cliente si este excede al monto total');
            $table->unsignedDecimal('total', 11, 2)->comment('monto total de la compra');
            $table->unsignedDecimal('descuento', 11, 2)->comment('si se aplica un descuento, definir el porcentaje');
            $table->boolean('es_enlinea')->comment('la compra es enlinea FALSE es compra fisica TRUE es compra en linea');
            $table->foreignId('id_estado_venta')->constrained('estado_venta', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('estado de la venta');
            $table->foreignId('id_iva')->constrained('iva', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('empleado')->comment('descuento de iva');
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
        Schema::dropIfExists('encabezado_venta');
    }
}
