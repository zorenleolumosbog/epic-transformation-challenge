<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserWeeklyAttachmentDetailResource extends JsonResource
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
            'type' => 'user_weekly_attachment_details',
            'attributes' => [
                'name' => $this->name,
                'file_name' => $this->file_name,
                'mime_type' => $this->mime_type,
                'path' => $this->path,
                'size' => $this->size,
                'description' => $this->description,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'deleted_at' => $this->deleted_at
            ]
        ];
    }
}
