<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function list();
    public function findById($id);
    public function store();
    public function update($id);
    public function destroy($id);
}