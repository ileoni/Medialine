<?php

namespace App\Repositories;

interface OrderRepositoryInterface
{
    public function list();
    public function store();
}