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
    if (!Schema::hasTable('unite')) {
        Schema::create('unite', function (Blueprint $table) {
            $table->unsignedBigInteger('code')->autoIncrement();
            $table->string('label');
            $table->primary('code');
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('unite')) {
        Schema::dropIfExists('unite');
        }
    }
};
