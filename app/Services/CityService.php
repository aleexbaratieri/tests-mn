<?php

namespace App\Services;

use App\Contracts\Crud;
use App\Repositories\CityRepository;

class CityService extends Service implements Crud
{
    protected $repository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->repository = $cityRepository;
    }
}