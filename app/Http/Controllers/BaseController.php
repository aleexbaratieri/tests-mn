<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        return $this->service->getAll();
    }

    public function store(Request $request)
    {
        return $this->service->storeNew($request->all());
    }

    public function show($id)
    {
        return $this->service->getById($id);
    }

    public function update(Request $request, $id)
    {
        return $this->service->updateById($request->all(), $id);
    }

    public function destroy($id)
    {
        $this->service->deleteById($id);
        return response()->json([], 204);
    }
}
