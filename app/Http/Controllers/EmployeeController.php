<?php

namespace App\Http\Controllers;

use App\Http\Repositories\EmployeeRepository;
use Illuminate\Database\Eloquent\Collection;

class EmployeeController extends Controller
{
    private EmployeeRepository $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return $this->employeeRepository->all();
    }
}
