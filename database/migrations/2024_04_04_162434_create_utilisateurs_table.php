<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('mot_de_passe');
            $table->enum('type_utilisateur', ['candidat', 'entreprise']);
            $table->timestamps();

        });
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();

            $table->string('titre');
            $table->string('description');
            $table->string('lieu');
            $table->string('salaire');
            $table->string('categorie');
            $table->dateTime('date_clotue', $precision = 0);
            $table->string('statut'); // actif ou expiré
            $table->string('type'); // stage ou emploi
            $table->timestamps();

        });
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise');
            $table->string('adresse');
            $table->string('secteur_activite');
            $table->string('logo')->nullable();
            $table->string('url_site')->nullable(); 
            $table->timestamps();

        });
        Schema::create('exigences', function (Blueprint $table) {
            $table->id();
            $table->string('exigence');
            $table->timestamps();
        });
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('qualification');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
