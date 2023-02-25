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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['PF','PJ'])->nullable();
            $table->string('cpf_cnpj')->unique();
            $table->boolean('active');
            $table->string('cellphone');
            $table->string('email');
            $table->string('town');
            $table->string('neighborhood');
            $table->string('street');
            $table->string('complement');
            $table->string('number');
            $table->text('veicle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
