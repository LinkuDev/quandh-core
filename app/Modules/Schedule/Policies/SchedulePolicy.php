<?php

namespace App\Modules\Schedule\Policies;

use App\Modules\Core\Models\User;
use App\Modules\Schedule\Models\Schedule;

/**
 * Owner check cho Schedule.
 *
 * - Chỉ người tạo (created_by) mới được update/destroy schedule của mình.
 * - Ngoại lệ: user có permission updateAll/destroyAll trên module tương ứng.
 *
 * Module prefix xác định qua schedule_type enum:
 * - thuong_truc → thuong-truc-schedules
 * - van_phong → van-phong-schedules
 */
class SchedulePolicy
{
    public function update(User $user, Schedule $schedule): bool
    {
        $prefix = $schedule->schedule_type->permissionPrefix();

        if ($user->can("{$prefix}.updateAll")) {
            return true;
        }

        return $schedule->created_by === $user->id;
    }

    public function destroy(User $user, Schedule $schedule): bool
    {
        $prefix = $schedule->schedule_type->permissionPrefix();

        if ($user->can("{$prefix}.destroyAll")) {
            return true;
        }

        return $schedule->created_by === $user->id;
    }
}
