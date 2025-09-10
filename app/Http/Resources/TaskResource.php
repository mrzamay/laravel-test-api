<?php

namespace App\Http\Resources;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'status' => $this->status,
            'name' => $this->user->name,
            'description' => $this->when(Route::currentRouteName() == 'tasks.show', $this->description),
            'created' => Carbon::parse($this->created_at)->format( "Y-m-d H:i:s"),
            'updated' => Carbon::parse($this->updated_at)->format( "Y-m-d H:i:s")
        ];
    }
}
