<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    const TABLE = 'states';

    protected $table = self::TABLE;

    protected $fillable = [
        'state',
        'uf'
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'id_city');
    }
}
