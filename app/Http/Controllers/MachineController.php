<?php

namespace App\Http\Controllers;

use App\Http\Repositories\MachineRepository;
use App\Http\Resources\MachineResourceCollection;
use App\Http\Resources\MachineStatusResource;
use App\Models\Machine;

class MachineController extends Controller
{
    private MachineRepository $machineRepository;

    public function __construct(MachineRepository $machineRepository)
    {
        $this->machineRepository = $machineRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): MachineResourceCollection
    {
        return new MachineResourceCollection($this->machineRepository->all());
    }

    public function getMachineStatus(Machine $machine): MachineStatusResource
    {
        return new MachineStatusResource($this->machineRepository->getStatus($machine->id));
    }
}
