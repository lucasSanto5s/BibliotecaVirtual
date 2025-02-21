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
        Schema::create('autores', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('nome'); // Nome do autor
            $table->text('biografia')->nullable(); // Biografia (pode ser nula)
            $table->date('data_nascimento')->nullable(); // Data de nascimento (pode ser nula)
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autores'); // Remove a tabela se a migration for revertida
    }
};