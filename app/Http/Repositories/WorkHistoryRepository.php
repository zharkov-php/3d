<?php

namespace App\Http\Repositories;

use App\Models\WorkHistory;

class WorkHistoryRepository
{
    public function create(int $employeeId, int $machineId): void
    {
        WorkHistory::create([
            'employee_id' => $employeeId,
            'machine_id' => $machineId,
            'started_at' => now(),
        ]);
    }

    public function update(int $employeeId, int $machineId): void
    {
        WorkHistory::where('employee_id', $employeeId)
            ->where('machine_id', $machineId)
            ->whereNull('ended_at')
            ->update(['ended_at' => now()]);
    }

    public function geHistory(string $key, int $id)
    {
       return WorkHistory::where($key, $id)->paginate(10);
    }
}
