<?php

namespace App\Http\Repositories;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Collection;

class MachineRepository
{
    public function all(): Collection
    {
        return Machine::all();
    }
}
