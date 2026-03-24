<?php

namespace App\Modules\Schedule\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduleCollection extends ResourceCollection
{
    public $collects = ScheduleResource::class;

    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
