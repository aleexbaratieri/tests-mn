<?php

namespace App\Http\Controllers;

use App\Services\CityService;

class CityController extends BaseController
{
    protected $service;

    public function __construct(CityService $cityService)
    {
        $this->service = $cityService;
    }
}
