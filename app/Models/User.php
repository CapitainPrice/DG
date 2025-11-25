<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; // Mantido, caso queira implementar verificação de e-mail no futuro
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Você pode adicionar 'implements MustVerifyEmail' se necessário
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable (Campos que podem ser preenchidos).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization (Campos ocultos ao serializar).
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast (Conversão automática de tipos).
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}