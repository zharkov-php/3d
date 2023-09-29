<?php

namespace App\Http\Repositories;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MachineRepository
{
    public function all(): Collection
    {
        return Machine::all();
    }
    public function getStatus(int $machineId): Builder|array|Collection|Model
    {
        return Machine::with('employees')->find($machineId);
    }
}
