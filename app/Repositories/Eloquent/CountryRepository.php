<?php

namespace App\Repositories\Eloquent;

use App\Models\Country;
use App\Repositories\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    protected $model;
    public function __construct(Country $model)
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
