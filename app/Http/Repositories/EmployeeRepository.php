<?php

namespace App\Http\Repositories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EmployeeRepository
{
    public function all(): Collection
    {
        return Employee::all();
    }
    public function getStatus(int $employeeId): Model|Collection|Builder|array|null
    {
        return Employee::with('machines')->find($employeeId);
    }

}
