<?php

namespace App\Http\Services;

class WorkHistoryService
{
    private const EMPLOYEE = 'employee';
    public function determineKey(string $type): string
    {
        return ($type === self::EMPLOYEE) ? 'employee_id' : 'machine_id';
    }
}
