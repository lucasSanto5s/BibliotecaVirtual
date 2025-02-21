<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'biografia',
        'data_nascimento',
    ];

    // Relacionamento com os livros
    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}