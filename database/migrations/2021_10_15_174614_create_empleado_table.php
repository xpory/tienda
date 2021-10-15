<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('users', 'id')->onUpdate('cascade')->onDelete('restrict')->comment('usuario');
            $table->unsignedDecimal('sueldo', 11, 2)->comment('sueldo que gana el empleado');
            $table->unsignedDecimal('precio_hora_nocturna', 11, 2)->comment('precio por hora nocturna que gana el usuario por ley 125%');
            $table->unsignedDecimal('precio_hora_extra', 11, 2)->comment('precio por hora extra que gana el usuario');
            $table->unsignedDecimal('isss', 11, 2)->nullable()->comment('descuento del seguro social si posee');
            $table->unsignedDecimal('afp_confia', 11, 2)->nullable()->comment('descuento de afp confia si posee');
            $table->unsignedDecimal('afp_crecer', 11, 2)->nullable()->comment('descuento de afp crecer si posee');
            $table->unsignedDecimal('renta', 11, 2)->nullable()->comment('descuento por retencion de renta si posee');
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
        Schema::dropIfExists('empleado');
    }
}
