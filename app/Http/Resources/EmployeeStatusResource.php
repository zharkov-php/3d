<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeStatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => Carbon::createFromDate($this->created_at)->format('Y-m-d h:m:s'),
            'updated_at' => Carbon::createFromDate($this->updated_at)->format('Y-m-d h:m:s'),
            'machines' => new MachineResourceCollection($this->machines),
        ];
    }
}
