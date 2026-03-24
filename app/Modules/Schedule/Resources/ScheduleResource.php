<?php

namespace App\Modules\Schedule\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'event_date' => $this->event_date?->format('d/m/Y'),
            'session' => $this->session,
            'start_time' => $this->start_time,
            'content' => $this->content,
            'location' => $this->location,
            'prep_unit' => $this->prep_unit,
            'driver_info' => $this->driver_info,
            'participant_count' => $this->whenLoaded('participants', fn () => $this->participants->count()),
            'color_code' => $this->color_code,
            'sort_order' => $this->sort_order,
            'organization_id' => $this->organization_id,
            'organization' => $this->whenLoaded('organization', fn () => $this->organization ? [
                'id' => $this->organization->id,
                'name' => $this->organization->name,
            ] : null),
            'status' => $this->status,
            'chairperson' => $this->whenLoaded('chairperson', fn () => $this->chairperson ? [
                'id' => $this->chairperson->id,
                'name' => $this->chairperson->name,
                'position' => $this->chairperson->position,
            ] : null),
            'meeting_type' => $this->whenLoaded('meetingType', fn () => $this->meetingType ? [
                'id' => $this->meetingType->id,
                'name' => $this->meetingType->name,
            ] : null),
            'nature' => $this->whenLoaded('nature', fn () => $this->nature ? [
                'id' => $this->nature->id,
                'name' => $this->nature->name,
            ] : null),
            'participants' => $this->whenLoaded('participants', fn () => $this->participants->map(fn ($p) => [
                'id' => $p->id,
                'user_id' => $p->user_id,
                'user_name' => $p->user?->name,
                'external_name' => $p->external_name,
            ])->values()),
            'notifications' => $this->whenLoaded('notifications', fn () => $this->notifications->map(fn ($n) => [
                'id' => $n->id,
                'user_id' => $n->user_id,
                'user_name' => $n->user?->name,
                'channel' => $n->channel,
                'remind_at' => $n->remind_at?->format('H:i:s d/m/Y'),
                'status' => $n->status,
            ])->values()),
            'attachments' => $this->whenLoaded('media', fn () => $this->attachments->map(fn ($media) => [
                'id' => $media->id,
                'name' => $media->name,
                'file_name' => $media->file_name,
                'size' => $media->size,
                'mime_type' => $media->mime_type,
                'url' => $media->getUrl(),
            ])->values()),
            'created_by' => $this->creator?->name ?? 'N/A',
            'updated_by' => $this->editor?->name ?? 'N/A',
            'created_at' => $this->created_at?->format('H:i:s d/m/Y'),
            'updated_at' => $this->updated_at?->format('H:i:s d/m/Y'),
        ];
    }
}
