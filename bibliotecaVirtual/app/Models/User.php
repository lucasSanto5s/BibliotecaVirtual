<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Campos que devem ser ocultos
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Campos que devem ser convertidos para tipos nativos
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacionamento com os empréstimos
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}
