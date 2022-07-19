<?php

namespace App\Services;

use App\Contracts\Crud;
use App\Repositories\StateRepository;

class StateService extends Service implements Crud
{
    protected $repository;

    public function __construct(StateRepository $stateRepository)
    {
        $this->repository = $stateRepository;
    }
}