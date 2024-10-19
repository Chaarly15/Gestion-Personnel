<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesCongesTable extends Migration
{
    public function up()
    {
        Schema::create('demandes_conges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained()->onDelete('cascade'); // Clé étrangère vers agents
            $table->date('date_debut'); // Date de début de congé
            $table->date('date_fin'); // Date de fin de congé
            $table->string('statut')->default('en attente'); // Statut de la demande
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demandes_conges');
    }
}
