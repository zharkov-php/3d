<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeMachine extends Pivot
{
    use HasFactory;

    protected $table = 'employee_machine';

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
