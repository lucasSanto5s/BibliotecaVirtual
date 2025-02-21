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
        Schema::create('livros', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('titulo'); // Título do livro
            $table->string('isbn')->unique(); // Número ISBN (único)
            $table->foreignId('autor_id')->constrained('autores')->onDelete('cascade'); // Chave estrangeira para autores
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); // Chave estrangeira para categorias
            $table->integer('ano_publicacao')->nullable(); // Ano de publicação (pode ser nulo)
            $table->text('descricao')->nullable(); // Descrição do livro (pode ser nula)
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros'); // Remove a tabela se a migration for revertida
    }
};
