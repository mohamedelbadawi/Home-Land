<?php

namespace App\Repositories;

use App\Models\Building;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BuildingRepositoryInterface
{

    public function all(): Collection;
    public function take($number): Collection;
    public function paginate($number);
    public function approvedCount();
    public function canceledCount();
    public function pendingCount();
    public function where($key, $value);
    public function pendingBuildings();
    public function approvedBuildings();
    public function update($data, Building $building);
    public function randomApprovedBuildings($number);
    public function with($attr);
    public function agentBuildings(User $user);
}
