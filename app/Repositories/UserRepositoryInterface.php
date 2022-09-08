<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{

    public function all(): Collection;
    public function take($number): Collection;
    public function paginate($number);
    public function agentCount();
    public function adminCount();
    public function update($data, User $user);
}
