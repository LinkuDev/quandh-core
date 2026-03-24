<?php

namespace App\Modules\Schedule\Policies;

use App\Modules\Core\Models\User;
use App\Modules\Schedule\Models\Schedule;

/**
 * Phân quyền theo bản ghi cho lịch công tác.
 *
 * - Người tạo (created_by) có quyền sửa/xóa lịch của mình.
 * - Công chức tổng hợp (có permission schedules.updateAll / schedules.destroyAll) sửa/xóa được tất cả.
 */
class SchedulePolicy
{
    /**
     * Cho phép sửa lịch nếu là chủ sở hữu hoặc có quyền updateAll.
     */
    public function update(User $user, Schedule $schedule): bool
    {
        if ($user->can('schedules.updateAll')) {
            return true;
        }

        return $schedule->created_by === $user->id;
    }

    /**
     * Cho phép xóa lịch nếu là chủ sở hữu hoặc có quyền destroyAll.
     */
    public function destroy(User $user, Schedule $schedule): bool
    {
        if ($user->can('schedules.destroyAll')) {
            return true;
        }

        return $schedule->created_by === $user->id;
    }
}
