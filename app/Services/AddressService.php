<?php

namespace App\Services;

use App\Contracts\Crud;
use App\Repositories\AddressRepository;

class AddressService extends Service implements Crud
{
    protected $repository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->repository = $addressRepository;
    }
}