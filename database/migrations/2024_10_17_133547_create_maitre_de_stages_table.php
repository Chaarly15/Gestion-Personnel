<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaitreDeStagesTable extends Migration
{
    public function up()
    {
        Schema::create('maitre_de_stages', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom du maître de stage
            $table->string('prenoms'); // Prénoms du maître de stage
            $table->string('contact'); // Contact du maître de stage
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maitre_de_stages');
    }
}
