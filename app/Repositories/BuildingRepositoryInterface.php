<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BuildingRepositoryInterface
{

    public function all(): Collection;
    public function take($number): Collection;
    public function paginate($number);
}
