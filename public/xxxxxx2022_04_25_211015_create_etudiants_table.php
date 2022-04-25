<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->text('nom');
            $table->text('adresse');
            $table->text('phone');
            $table->string('email')->unique();
            $table->date('date_de_naissance');
            $table->foreignId('villeId')->constrained('villes');
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
        Schema::dropIfExists('etudiants');
    }
}
