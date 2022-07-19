<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const TABLE = 'users';

    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'email',
        'password',
        'id_address'
    ];

    protected $hidden = [
        'password'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address');
    }
}
