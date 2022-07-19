<?php

namespace App\Contracts;

interface Crud
{
    public function getAll();

    public function storeNew(array $data);
    
    public function getById($id);

    public function updateById(array $data, $id);

    public function deleteById($id);
}