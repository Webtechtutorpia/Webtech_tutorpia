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
            $table->string('bezeichnung')->index();;
            $table->Integer('geleitet_von')->unsigned();
            //Constraints
            $table->foreign('geleitet_von')->references('id')->on('users');
        });
        Schema::create('belegung', function (Blueprint $table){
            $table->increments('id');
            $table->Integer('user')->unsigned();
            $table->string('kurs')->index();
            $table->string('rolle');
            //Constraints
            $table->foreign('user')->references('id')->on('users');

        });
        Schema::create('aufgabe', function (Blueprint $table){
            $table->increments('id');
            $table->string('aufgabenname');
            $table->string('abgabedatum')->default(date("Y-m-d"));
            $table->string('aufgabenbeschreibung')->nullable();
            $table->Integer('erstellt_von')->default(1)->unsigned();
            $table->string('kurs')->index()->nullable();;
            $table->timestamps();
            //->default(date("Y-m-d"))
            $table->date('deleted_at')->nullable();
            //Constraints
            //$table->foreign('kurs')->references('id')->on('kurs');
            $table->foreign('erstellt_von')->references('id')->on('users');
            $table->foreign('kurs')->references('kurs')->on('belegung');
        });



//        //Erzeuge Abgabentabelle
        Schema::create('abgabe', function (Blueprint $table){
            $table->increments('abgabeid');
            $table->string('zustand');
            $table->Integer('user')->unsigned();
            $table->Integer('zugehoerig_zu')->unsigned();
            $table->string('kommentar')->nullable();
            $table->timestamps();
            //Constraints
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('zugehoerig_zu')->references('id')->on('aufgabe')->onDelete('Cascade');
        });
//        //Erzeuge Aktivität
        Schema::create('activity', function (Blueprint $table){
            $table->increments('id');
            $table->String('abgabedatum')->nullable();
            $table->string('aufgabenname');
            $table->string('bearbeitet_von');
            $table->Integer('zuordnung_aufgabe')->unsigned()-> nullable();
            $table->Integer('zuordnung_abgabe')->unsigned()-> nullable();
            $table->timestamps();
            //Constraints
            $table->foreign('zuordnung_aufgabe')->references('id')->on('aufgabe')->nullable();
            $table->foreign('zuordnung_abgabe') ->references('abgabeid')->on('abgabe')->onDelete('Cascade')->nullable();
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
        Schema::dropIfExists('belegung');
        Schema::dropIfExists('aufgabe');
        Schema::dropIfExists('abgabe');
        Schema::dropIfExists('activity');
        Schema::enableForeignKeyConstraints();
    }
}
