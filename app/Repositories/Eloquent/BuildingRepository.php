<?php

namespace App\Repositories\Eloquent;

use App\Models\Building;
use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository as EloquentBaseRepository;
use BaseRepository;
use Illuminate\Database\Eloquent\Collection;


class BuildingRepository extends EloquentBaseRepository implements BuildingRepositoryInterface
{
    public function __construct(Building $model)
    {
        parent::__construct($model);
    }
    public function all(): Collection
    {
        return $this->model->with(['user', 'city', 'country'])->all();
    }
    public function take($number): Collection
    {
        return $this->model->take($number);
    }
    public function paginate($number)
    {
        return $this->model->with(['agent', 'city', 'country'])->paginate($number);
    }
}
