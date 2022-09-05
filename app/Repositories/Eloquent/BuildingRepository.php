<?php

namespace App\Repositories\Eloquent;

use App\Models\Building;
use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BuildingRepository extends BaseRepository implements BuildingRepositoryInterface
{
    public function __construct(Building $model)
    {
        parent::__construct($model);
    }
    public function all(): Collection
    {
        return $this->model->with(['agent', 'city', 'country'])->get();
    }
    public function take($number): Collection
    {
        return $this->model->take($number);
    }
    public function paginate($number)
    {
        return $this->model->with(['agent', 'city', 'country'])->paginate($number);
    }
    public function approvedCount()
    {
        return $this->model->where('status', 'approved')->count();
    }
    public function canceledCount()
    {
        return $this->model->where('status', 'canceled')->count();
    }
    public function pendingCount()
    {
        return $this->model->where('status', 'pending')->count();
    }
    public function where($key, $value)
    {
        return $this->model->where($key, $value)->get();
    }
    public function pendingBuildings()
    {
        return $this->model->with(['agent'])->where('status', 'pending')->orderBy('created_at', 'desc')->get();
    }
    public function approvedBuildings()
    {
        return $this->model->with(['agent'])->where('status', 'approved')->orderBy('created_at', 'desc')->get();
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
    public function update($data, Building $building)
    {
        return $building->update($data);
    }
}
