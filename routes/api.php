<?php

use App\Modules\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Auth module - public routes (đăng nhập, quên mật khẩu, đặt lại mật khẩu)
Route::prefix('auth')->middleware('log.activity')->group(function () {
    require base_path('app/Modules/Auth/Routes/auth.php');
});

// Cấu hình công khai - không cần xác thực
Route::get('/settings/public', [\App\Modules\Core\SettingController::class, 'public'])->middleware('log.activity');
Route::get('/departments/public', [\App\Modules\Core\DepartmentController::class, 'public'])->middleware('log.activity');
Route::get('/departments/public-options', [\App\Modules\Core\DepartmentController::class, 'publicOptions'])->middleware('log.activity');
Route::get('/schedules/public', [\App\Modules\Schedule\ScheduleController::class, 'publicIndex'])->middleware('log.activity');
Route::get('/schedule-meeting-types/public', [\App\Modules\Schedule\ScheduleMeetingTypeController::class, 'public'])->middleware('log.activity');
Route::get('/schedule-meeting-types/public-options', [\App\Modules\Schedule\ScheduleMeetingTypeController::class, 'publicOptions'])->middleware('log.activity');
Route::get('/schedule-natures/public', [\App\Modules\Schedule\ScheduleNatureController::class, 'public'])->middleware('log.activity');
Route::get('/schedule-natures/public-options', [\App\Modules\Schedule\ScheduleNatureController::class, 'publicOptions'])->middleware('log.activity');

// Route yêu cầu đăng nhập (Bearer token) và đặt ngữ cảnh team cho Spatie Permission
Route::middleware(['auth:sanctum', 'set.permissions.team', 'log.activity'])->group(function () {
    Route::get('/user', [AuthController::class, 'me']);

    Route::prefix('users')->group(function () {
        require base_path('app/Modules/Core/Routes/user.php');
    });
    Route::prefix('permissions')->group(function () {
        require base_path('app/Modules/Core/Routes/permission.php');
    });
    Route::prefix('roles')->group(function () {
        require base_path('app/Modules/Core/Routes/role.php');
    });
    Route::prefix('departments')->group(function () {
        require base_path('app/Modules/Core/Routes/department.php');
    });
    Route::prefix('log-activities')->group(function () {
        require base_path('app/Modules/Core/Routes/log_activity.php');
    });
    Route::prefix('settings')->group(function () {
        require base_path('app/Modules/Core/Routes/setting.php');
    });
    Route::prefix('schedules')->group(function () {
        require base_path('app/Modules/Schedule/Routes/schedule.php');
    });
    Route::prefix('schedule-meeting-types')->group(function () {
        require base_path('app/Modules/Schedule/Routes/schedule_meeting_type.php');
    });
    Route::prefix('schedule-natures')->group(function () {
        require base_path('app/Modules/Schedule/Routes/schedule_nature.php');
    });
    Route::prefix('schedule-notifications')->group(function () {
        require base_path('app/Modules/Schedule/Routes/schedule_notification.php');
    });
});
