<?php

namespace App\Repositories;

use App\Contracts\Crud;
use App\Models\State;

class StateRepository extends Repository implements Crud
{
    protected $entity;

    public function __construct(State $state)
    {
        $this->entity = $state;
    }
}