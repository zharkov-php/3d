<?php

namespace App\Http\Controllers;

use App\Http\Repositories\EmployeeRepository;
use App\Http\Resources\EmployeeResourceCollection;
use App\Http\Resources\EmployeeStatusResource;
use App\Models\Employee;

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
    public function index(): EmployeeResourceCollection
    {
        return new EmployeeResourceCollection($this->employeeRepository->all());
    }

    public function getEmployeeStatus(Employee $employee): EmployeeStatusResource
    {
        return new EmployeeStatusResource($this->employeeRepository->getStatus($employee->id));
    }
}
