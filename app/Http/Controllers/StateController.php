<?php

namespace App\Http\Controllers;

use App\Services\StateService;

class StateController extends BaseController
{
    protected $service;

    public function __construct(StateService $stateService)
    {
        $this->service = $stateService;
    }
}
