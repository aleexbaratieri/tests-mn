<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    const TABLE = 'cities';

    protected $table = self::TABLE;

    protected $fillable = [
        'city',
        'id_state',
    ];
    
    public function adrresses()
    {
        return $this->hasMany(Address::class, 'id_city');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'id_state');
    }
}
