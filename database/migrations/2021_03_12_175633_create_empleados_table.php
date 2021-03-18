<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 25);
            $table->string('nombre', 50);
            $table->decimal('sueldo_dolar',10,2);
            $table->decimal('sueldo_pesos',10,2);
            $table->string('correo', 50);
            $table->string('direccion', 50);
            $table->string('estado', 50);
            $table->string('ciudad', 50);
            $table->string('telefono', 50);
            $table->boolean('activo', 50);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
