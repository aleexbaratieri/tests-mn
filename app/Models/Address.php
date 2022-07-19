<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    const TABLE = 'addresses';

    protected $table = self::TABLE;

    protected $fillable = [
        'address',
        'id_city',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_address');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'id_city');
    }
}
