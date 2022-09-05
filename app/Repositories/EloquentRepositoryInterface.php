<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    public function create(array $attributes);
    public function find($id): ?Model;
}
