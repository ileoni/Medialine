<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;

interface UserRepositoryInterface
{
    public function list();
    public function findById($id);
    public function store();
    public function update($id);
    public function destroy($id);
}