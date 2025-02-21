<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'livro_id',
        'usuario_id',
        'data_emprestimo',
        'data_devolucao_prevista',
        'data_devolucao_real',
        'devolvido',
    ];

    // Relacionamento com o livro
    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    // Relacionamento com o usuário
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}