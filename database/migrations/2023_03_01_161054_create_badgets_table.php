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
        Schema::create('badgets', function (Blueprint $table) {
            $table->id();
            $table->enum('color', ['Vermelho', 'Azul', 'Amarelo', 'Verde', 'Branco', 'Branco com vermelho','Cinza']);
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badgets');
    }
};
