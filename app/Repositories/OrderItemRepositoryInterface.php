<?php

namespace App\Repositories;

interface OrderItemRepositoryInterface
{
    public function list(); 
    public function store();
}