<?php

namespace App\Repositories\Eloquent;

use App\Models\City;
use App\Repositories\CityRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    protected $model;
    public function __construct(City $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function find($id): ?Model
    {
        return  $this->model->find($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
}
