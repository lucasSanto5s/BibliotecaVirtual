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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->foreignId('livro_id')->constrained('livros')->onDelete('cascade'); // Chave estrangeira para livros
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para usuários
            $table->date('data_emprestimo'); // Data do empréstimo
            $table->date('data_devolucao_prevista'); // Data de devolução prevista
            $table->date('data_devolucao_real')->nullable(); // Data de devolução real (pode ser nula)
            $table->boolean('devolvido')->default(false); // Status do empréstimo (devolvido ou não)
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos'); // Remove a tabela se a migration for revertida
    }
};