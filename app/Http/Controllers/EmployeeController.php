<?php

namespace App\Http\Controllers;

use App\Http\Repositories\EmployeeRepository;
use App\Http\Resources\EmployeeResourceCollection;
use App\Http\Resources\EmployeeStatusResource;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
