<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public $incrementing = true; // ✅ enable auto-increment
    protected $keyType = 'int';

    protected $fillable = ['username', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed', // Laravel 10+ auto-hashes
        ];
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
