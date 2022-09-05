<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface CityRepositoryInterface
{
    public function all(): Collection;
}
