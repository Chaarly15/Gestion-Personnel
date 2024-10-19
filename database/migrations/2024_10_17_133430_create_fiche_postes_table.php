<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichePostesTable extends Migration
{
    public function up()
    {
        Schema::create('fiche_postes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained()->onDelete('cascade');  // Associe à un agent
            $table->string('fonction');
            $table->text('attributions');  // Décrit les attributions
            $table->text('taches');  // Décrit les tâches
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fiche_postes');
    }
}
