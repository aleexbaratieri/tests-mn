<?php

namespace App\Repositories;

use App\Contracts\Crud;
use App\Models\City;

class CityRepository extends Repository implements Crud
{
    protected $entity;

    public function __construct(City $city)
    {
        $this->entity = $city;
    }
}