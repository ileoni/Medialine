<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function list();
    public function findById($id);
    public function store();
    public function update($id);
    public function destroy($id);
}