<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'titulo',
        'isbn',
        'autor_id',
        'categoria_id',
        'ano_publicacao',
        'descricao',
    ];

    // Relacionamento com o autor
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    // Relacionamento com a categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relacionamento com os empréstimos
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}