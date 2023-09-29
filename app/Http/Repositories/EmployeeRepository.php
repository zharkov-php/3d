<?php

namespace App\Http\Repositories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository
{
    public function all(): Collection
    {
        return Employee::all();
    }

}
