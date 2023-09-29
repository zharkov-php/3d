<?php

namespace App\Http\Controllers;

use App\Http\Repositories\MachineRepository;
use Illuminate\Database\Eloquent\Collection;

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
    public function index(): Collection
    {
        return $this->machineRepository->all();
    }
}
