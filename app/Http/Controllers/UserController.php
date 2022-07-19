<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    protected function statisticsCouter(Request $filter)
    {
        return $this->service->counter($filter->all());
    }
}
