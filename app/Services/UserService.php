<?php

namespace App\Services;

use App\Contracts\Crud;
use App\Repositories\UserRepository;

class UserService extends Service implements Crud
{
    protected $repository;

    protected $availableFilters = [
        'city' => null,
        'state' => null
    ];

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function counter(array $filters)
    {
        $filters = array_intersect_key($filters, $this->availableFilters);
        $users = $this->repository->counter($filters);
        
        return [
            'total_users' => $users->count(),
            'filters' => $filters
        ]; 
    }
}