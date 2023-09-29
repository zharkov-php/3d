<?php

namespace App\Http\Controllers;

use App\Http\Repositories\WorkHistoryRepository;
use App\Http\Requests\GetHistoryRequest;
use App\Http\Resources\WorkHistoryResourceCollection;
use App\Http\Services\WorkHistoryService;

class WorkHistoryController extends Controller
{
    private WorkHistoryRepository $workHistoryRepository;
    private WorkHistoryService $workHistoryService;

    public function __construct(
        WorkHistoryRepository $workHistoryRepository,
        WorkHistoryService $workHistoryService,
    )
    {
        $this->workHistoryRepository = $workHistoryRepository;
        $this->workHistoryService = $workHistoryService;
    }

    public function getHistory(GetHistoryRequest $request)
    {
        $id = $request->input('id');
        $key = $this->workHistoryService->determineKey($request->input('type'));

        return new WorkHistoryResourceCollection($this->workHistoryRepository->geHistory($key, $id));
    }
}
