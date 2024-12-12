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
        if (!Schema::hasTable('recipe')) {
        Schema::create('recipe', function (Blueprint $table) {
            $table->id('id_recipe');
            $table->string('recipe_name');
            $table->text('recipe_content');
            $table->boolean('view');
            $table->date('date_add')->default(now());
            $table->date('date_update')->nullable();
            $table->foreignId('id_user')->constrained('users', 'id_user');
            $table->foreignId('id_type')->constrained('type', 'id_type');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('recipe')) {
        Schema::dropIfExists('recipe');
        }
    }
};
