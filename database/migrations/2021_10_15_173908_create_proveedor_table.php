<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->comment('nombre del proveedor');
            $table->string('telefono', 9)->comment('numero de telefono de telefono');
            $table->string('direccion', 100)->comment('Direccion del proveedor');
            $table->string('correo', 100)->comment('Direccion de correo del proveedor');
            $table->boolean('estado')->comment('el estado en la que se encuentra FALSE inactivo y TRUE activo');;
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
        Schema::dropIfExists('proveedor');
    }
}
