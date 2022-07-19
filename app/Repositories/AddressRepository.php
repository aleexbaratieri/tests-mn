<?php

namespace App\Repositories;

use App\Contracts\Crud;
use App\Models\Address;

class AddressRepository extends Repository implements Crud
{
    protected $entity;

    public function __construct(Address $address)
    {
        $this->entity = $address;
    }
}