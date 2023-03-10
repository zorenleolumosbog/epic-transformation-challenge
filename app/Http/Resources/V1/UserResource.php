<?php

namespace App\Http\Resources\V1;

use App\Models\V1\UserWeeklyAttachment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $weekly_attachment = UserWeeklyAttachment::where('user_id', $this->id)->latest()->first();
        $percentage = 0;
        if($this->profile()->first() && $weekly_attachment) {
            $percentage = (floatval($this->profile()->first()->desired_weight_goal) / floatval($weekly_attachment->weight)) * 100;
        }

        return [
            'id' => $this->id,
            'type' => 'users',
            'attributes' => [
                'name' => $this->name,
                'desired_weight_goal_percentage' => (string) $percentage,
                'is_admin' => $this->is_admin,
                'is_admin' => $this->is_admin,
                'logged_in_at' => $this->logged_in_at,
                'telegram_link_url' => $this->telegram_link_url,
                'profile' => $this->profile()->first(),
                'weekly_attachments' => $this->weeklyAttachments()->with('weeklyAttachmentDetails')->get(),
                'telegram_link' => $this->telegramLink()->first(),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'deleted_at' => $this->deleted_at
            ]
        ];
    }
}
