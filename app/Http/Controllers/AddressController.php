<?php

namespace App\Http\Controllers;

use App\Services\AddressService;

class AddressController extends BaseController
{
    protected $service;

    public function __construct(AddressService $addressService)
    {
        $this->service = $addressService;
    }
}
