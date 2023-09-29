<?php

namespace App\Http\Controllers;

use App\Http\Repositories\MachineRepository;
use App\Http\Resources\MachineResourceCollection;
use App\Models\Machine;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

    public function getMachineStatus(Machine $machine): Model|Collection|Builder|array
    {
        return $this->machineRepository->getStatus($machine->id);
    }
}
