<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicationResource extends JsonResource
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
            'task_job' => $this->taskJob ? new JobResource($this->taskJob) : null,
            'user' => $this->user->only('id', 'name', 'email'),
            'applied_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
