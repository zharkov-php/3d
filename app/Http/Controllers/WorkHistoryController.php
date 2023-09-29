<?php

namespace App\Http\Controllers;

use App\Http\Repositories\WorkHistoryRepository;
use App\Http\Resources\WorkHistoryResourceCollection;
use Illuminate\Http\JsonResponse;

class WorkHistoryController extends Controller
{
    private WorkHistoryRepository $workHistoryRepository;

    public function __construct(WorkHistoryRepository $workHistoryRepository)
    {
        $this->workHistoryRepository = $workHistoryRepository;
    }

    public function getHistory(string $type, int $id)
    {
        if (!in_array($type, ['employee', 'machine'])) {
            return response()->json(['message' => 'Invalid type'], 400);
        }

        $key = ($type === 'employee') ? 'employee_id' : 'machine_id';

        return new WorkHistoryResourceCollection($this->workHistoryRepository->geHistory($key, $id));
    }
}
