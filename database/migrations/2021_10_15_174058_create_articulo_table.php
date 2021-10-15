<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_categoria')->constrained('categoria','id')->onUpdate('cascade')->onDelete('restrict')->comment('categoria');
            $table->string('codigo', 20)->comment('codigo del articulo');
            $table->string('nombre',50)->comment('nombre del articulo');
            $table->foreignId('id_proveedor')->constrained('proveedor', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('proveedor');
            $table->unsignedDecimal('precio_venta', 11, 2)->comment('precio que se le asigna para la venta');
            $table->unsignedInteger('stock')->comment('cantidad de articulos en existencia para stock');
            $table->string('descripcion', 100)->comment('descripcion del articulo');
            $table->string('imagen')->comment('direccion de donde se aloja la imagen del articulo');
            $table->boolean('estado')->comment('estado del articulo FALSE inactivo TRUE activo');
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
        Schema::dropIfExists('articulo');
    }
}
