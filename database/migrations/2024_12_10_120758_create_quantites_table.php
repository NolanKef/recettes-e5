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
        if (!Schema::hasTable('quantite')) {
        Schema::create('quantite', function (Blueprint $table) {
            $table->id('id_quantite');
            $table->foreignId('id_recipe')->constrained('recipe', 'id_recipe');
            $table->foreignId('id_ingredient')->constrained('ingredient', 'id_ingredient');
            $table->string('quantite');
            $table->foreignId('code')->constrained('unite', 'code');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('quantite')) {
        Schema::dropIfExists('quantite');
        }
    }
};
