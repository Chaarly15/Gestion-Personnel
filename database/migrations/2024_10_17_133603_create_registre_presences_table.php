<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrePresencesTable extends Migration
{
    public function up()
    {
        Schema::create('registre_presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained()->onDelete('cascade'); // Clé étrangère vers agents
            $table->date('date'); // Date de présence
            $table->time('heure_arrivee'); // Heure d'arrivée
            $table->time('heure_depart'); // Heure de départ
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registre_presences');
    }
}
