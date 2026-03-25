<?php

namespace App\Modules\Schedule\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleNotificationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'schedule_id' => $this->schedule_id,
            'schedule' => $this->whenLoaded('schedule', fn () => [
                'id' => $this->schedule->id,
                'content' => $this->schedule->content,
                'event_date' => $this->schedule->event_date?->format('d/m/Y'),
                'session' => $this->schedule->session,
                'department' => $this->schedule->department?->name,
            ]),
            'channel' => $this->channel,
            'status' => $this->status,
            'remind_at' => $this->remind_at?->format('H:i:s d/m/Y'),
            'sent_at' => $this->sent_at?->format('H:i:s d/m/Y'),
            'read_at' => $this->read_at?->format('H:i:s d/m/Y'),
            'is_read' => $this->read_at !== null,
            'created_at' => $this->created_at?->format('H:i:s d/m/Y'),
        ];
    }
}
