<?php

namespace App\Modules\Schedule\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduleNotificationCollection extends ResourceCollection
{
    public $collects = ScheduleNotificationResource::class;

    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
