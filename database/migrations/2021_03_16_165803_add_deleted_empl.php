<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeletedEmpl extends Migration
{
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            //
        });
    }
}
