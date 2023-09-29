<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function machines(): BelongsToMany
    {
        return $this->belongsToMany(Machine::class, 'employee_machine')->withTimestamps();
    }
}
