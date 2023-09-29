<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'machine_id',
        'started_at',
        'ended_at',
        ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
