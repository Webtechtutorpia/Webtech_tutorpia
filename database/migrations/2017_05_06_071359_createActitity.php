<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActitity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Actifity', function (Blueprint $table) {
            $table->increments('id');
            $table->date('created_at');
            $table->string('Rolle');
            $table->string('Name');
            $table->Integer('Activityart');
            $table->rememberToken();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropifExists('Actifity');
    }
}
