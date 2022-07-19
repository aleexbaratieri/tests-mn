<?php

namespace App\Services;

abstract class Service
{
    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function storeNew(array $data)
    {
        return $this->repository->storeNew($data);
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function updateById(array $data, $id)
    {
        return $this->repository->updateById($data, $id);
    }

    public function deleteById($id)
    {
        $this->repository->deleteById($id);
    }
}
