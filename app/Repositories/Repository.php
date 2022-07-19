<?php

namespace App\Repositories;

use App\Exceptions\RepositoryException;

abstract class Repository
{   
    public function getAll()
    {
        return $this->entity->get();
    }

    public function storeNew(array $data)
    {
        try {
            
            return $this->entity->create($data);
        
        } catch (\Exception $err) {
            throw new RepositoryException($err->getMessage(), 500);
        }
    }

    public function getById($id)
    {
        return $this->entity->where('id', $id)->firstOrFail();
    }

    public function updateById(array $data, $id)
    {
        $resource = $this->getById($id);
        
        try {
            
            $resource->update($data);
            return $resource;
        
        } catch (\Exception $err) {
            throw new RepositoryException($err->getMessage(), 500);
        }
    }

    public function deleteById($id)
    {
        $resource = $this->getById($id);

        try {

            $resource->delete();

        } catch (\Exception $err) {
            throw new RepositoryException($err->getMessage(), 500);
        }
    }
}
