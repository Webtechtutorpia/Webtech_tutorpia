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
            $table->string('Rolle')->default();
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
            $table->string('Bezeichnung');
            $table->Integer('geleitet_von')->unsigned();
            //Constraints
            $table->foreign('geleitet_von')->references('id')->on('users');
        });
//        //Erzeuge Aufgabentabelle
        Schema::create('Aufgabe', function (Blueprint $table){
            $table->increments('id');
            $table->string('Aufgabenname');
            $table->Date('Abgabedatum');
            $table->string('Aufgabenbeschreibung');
            $table->Integer('erstellt_von')->unsigned();
            $table->timestamps();
            $table->date('deleted_at');
            //Constraints
            $table->foreign('erstellt_von')->references('id')->on('users');
        });
//        //Erzeuge Abgabentabelle
        Schema::create('Abgabe', function (Blueprint $table){
            $table->increments('id');
            $table->string('Aufgabenname');
            $table->Date('Abgabedatum');
            $table->string('Aufgabenbeschreibung');
            $table->Integer('erstellt')->unsigned();
            $table->Integer('zugehoerig_zu')->unsigned();
            $table->timestamps();
            //Constraints
            $table->foreign('erstellt')->references('id')->on('users');
            $table->foreign('zugehoerig_zu')->references('id')->on('Aufgabe')->onDelete('Cascade');
        });
//        //Erzeuge Aktivität
        Schema::create('Aktivitaet', function (Blueprint $table){
            $table->increments('id');
            $table->date('created_at');
            $table->Date('Abgabedatum');
            $table->string('Aufgabenbeschreibung');
            $table->Integer('zuordnung_aufgabe')->unsigned();
            $table->Integer('zuordnung_abgabe')->unsigned();
            //Constraints
            $table->foreign('zuordnung_aufgabe')->references('id')->on('Aufgabe')->nullable();
            $table->foreign('zuordnung_abgabe') ->references('id')->on('Abgabe')->nullable();
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
        Schema::dropIfExists('Aufgabe');
        Schema::dropIfExists('Abgabe');
        Schema::dropIfExists('Aktivitaet');
        Schema::enableForeignKeyConstraints();
    }
}
