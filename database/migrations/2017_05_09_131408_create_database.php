<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        //Erzeuge Userstabelle
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rolle')->default();
            $table->rememberToken();
            $table->timestamps();
        });

        //Erzeuge passwortvergessen table
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at')->nullable();
        });
        //Erzeuge kurstabelle
        Schema::create('kurs', function (Blueprint $table){
            $table->increments('id');
            $table->string('bezeichnung');
            $table->Integer('geleitet_von')->unsigned();
            //Constraints
            $table->foreign('geleitet_von')->references('id')->on('users');
        });
//        //Erzeuge Aufgabentabelle
        Schema::create('aufgabe', function (Blueprint $table){
            $table->increments('id');
            $table->string('aufgabenname');
            $table->string('abgabedatum');
            $table->string('aufgabenbeschreibung');
            $table->Integer('erstellt_von')->default(1)->unsigned();
            $table->timestamps();
            $table->date('deleted_at')->default(date("Y-m-d"));
            //Constraints
            $table->foreign('erstellt_von')->references('id')->on('users');
        });
//        //Erzeuge Abgabentabelle
        Schema::create('abgabe', function (Blueprint $table){
            $table->increments('id');
            $table->string('aufgabenname');
            $table->Date('abgabedatum');
            $table->string('aufgabenbeschreibung');
            $table->Integer('erstellt')->unsigned();
            $table->Integer('zugehoerig_zu')->unsigned();
            $table->timestamps();
            //Constraints
            $table->foreign('erstellt')->references('id')->on('users');
            $table->foreign('zugehoerig_zu')->references('id')->on('aufgabe')->onDelete('Cascade');
        });
//        //Erzeuge Aktivität
        Schema::create('activity', function (Blueprint $table){
            $table->increments('id');
            $table->date('created_at');
            $table->Date('abgabedatum');
            $table->string('aufgabenbeschreibung');
            $table->Integer('zuordnung_aufgabe')->unsigned();
            $table->Integer('zuordnung_abgabe')->unsigned();
            //Constraints
            $table->foreign('zuordnung_aufgabe')->references('id')->on('aufgabe')->nullable();
            $table->foreign('zuordnung_abgabe') ->references('id')->on('abgabe')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('kurs');
        Schema::dropIfExists('users');
        Schema::dropIfExists('aufgabe');
        Schema::dropIfExists('abgabe');
        Schema::dropIfExists('activity');
        Schema::enableForeignKeyConstraints();
    }
}
