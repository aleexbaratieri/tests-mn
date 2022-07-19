<?php

namespace App\Repositories;

use App\Contracts\Crud;
use App\Models\User;

class UserRepository extends Repository implements Crud
{
    protected $entity;

    public function __construct(User $user)
    {
        $this->entity = $user;
    }

    public function counter(array $filters)
    {
        if(count($filters) > 0) {
            foreach($filters as $filter => $value) {
                $this->entity = $this->applyFilter($filter, $value);
            }
        }
        
        return $this->entity->get();
    }

    private function applyFilter(string $type, mixed $value)
    {
        if($type === 'city') {
            return $this->entity->whereHas('address', function($query) use ($value) {
                return $query->whereHas('city', function($query) use ($value){
                    return $query->whereRaw("UPPER(city) LIKE '%". strtoupper($value)."%'");
                });
            });
        }

        if($type === 'state') {
            return $this->entity->whereHas('address.city', function($query) use ($value) {
                return $query->whereHas('state', function($query) use($value){
                    return $query->orWhere('uf', $value)->orWhere('state', $value);
                });
            });
        }
    }
}