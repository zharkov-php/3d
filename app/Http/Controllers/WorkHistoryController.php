<?php

namespace App\Http\Controllers;

use App\Http\Repositories\WorkHistoryRepository;
use Illuminate\Http\JsonResponse;

class WorkHistoryController extends Controller
{
    private WorkHistoryRepository $workHistoryRepository;

    public function __construct(WorkHistoryRepository $workHistoryRepository)
    {
        $this->workHistoryRepository = $workHistoryRepository;
    }

    public function getHistory(string $type, int $id): JsonResponse
    {
        if (!in_array($type, ['employee', 'machine'])) {
            return response()->json(['message' => 'Invalid type'], 400);
        }

        $key = ($type === 'employee') ? 'employee_id' : 'machine_id';

        return $this->workHistoryRepository->geHistory($key, $id);
    }
}
