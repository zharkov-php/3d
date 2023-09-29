<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkHistoryResource extends JsonResource
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
            'employee_id' => $this->employee_id,
            'machine_id' => $this->machine_id,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
            'created_at' => Carbon::createFromDate($this->created_at)->format('Y-m-d h:m:s'),
            'updated_at' => Carbon::createFromDate($this->updated_at)->format('Y-m-d h:m:s'),
        ];
    }
}
