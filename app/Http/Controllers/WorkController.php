<?php

namespace App\Http\Controllers;

use App\Http\Repositories\WorkHistoryRepository;
use App\Models\Employee;
use App\Models\Machine;
use Illuminate\Http\JsonResponse;

class WorkController extends Controller
{
    private WorkHistoryRepository $workHistoryRepository;

    public function __construct(WorkHistoryRepository $workHistoryRepository)
    {
        $this->workHistoryRepository = $workHistoryRepository;
    }

    public function assignMachineToEmployee(Employee $employee, Machine $machine): JsonResponse
    {
        if ($machine?->employees->isEmpty()) {
            $employee?->machines()->attach($machine->id);
            $this->workHistoryRepository->create($employee->id, $machine->id);
            return response()->json(['message' => 'Assigned']);
        }

        return response()->json(['message' => 'Machine is already assigned']);
    }

    public function unassignMachineFromEmployee(Employee $employee, Machine $machine): JsonResponse
    {
        $employee?->machines()->detach($machine->id);

        $this->workHistoryRepository->update($employee->id, $machine->id);

        return response()->json(['message' => 'Unassigned']);
    }
}
