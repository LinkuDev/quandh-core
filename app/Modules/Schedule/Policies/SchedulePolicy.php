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
 * Module prefix xác định qua department.slug của schedule:
 * - van-phong-thanh-uy → van-phong-schedules
 * - Còn lại → thuong-truc-schedules
 */
class SchedulePolicy
{
    public function update(User $user, Schedule $schedule): bool
    {
        $prefix = $this->getModulePrefix($schedule);

        if ($user->can("{$prefix}.updateAll")) {
            return true;
        }

        return $schedule->created_by === $user->id;
    }

    public function destroy(User $user, Schedule $schedule): bool
    {
        $prefix = $this->getModulePrefix($schedule);

        if ($user->can("{$prefix}.destroyAll")) {
            return true;
        }

        return $schedule->created_by === $user->id;
    }

    private function getModulePrefix(Schedule $schedule): string
    {
        $department = $schedule->department;

        if ($department && $department->slug === 'van-phong-thanh-uy') {
            return 'van-phong-schedules';
        }

        return 'thuong-truc-schedules';
    }
}
