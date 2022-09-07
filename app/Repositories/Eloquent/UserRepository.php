<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function all(): Collection
    {
        return $this->model->all();
    }
    public function take($number): Collection
    {
        return $this->model->take($number);
    }
    public function paginate($number)
    {
        return $this->model->paginate($number);
    }
    public function agentCount()
    {
        $agents = $this->model->with(['roles'])->get();
        return $agents->reject(function ($user, $key) {
            return $user->hasRole('admin');
        })->count();
    }
    public function adminCount()
    {
        $admins = $this->model->with(['roles'])->get();
        return $admins->reject(function ($user, $key) {
            return $user->hasRole('agent');
        })->count();
    }

    public function agentBuildings()
    {
        return $this->model->buildings;
    }
}
