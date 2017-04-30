<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Rolle hinzufügen
        Schema::table('users', function($table)
        {
            $table->String('rolle')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Rolle löschen
        Schema::table('users', function($table)
        {
            $table->dropColumn('rolle');
        });
    }
}
