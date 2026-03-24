<?php

use App\Modules\Schedule\ScheduleMeetingTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/export', [ScheduleMeetingTypeController::class, 'export'])->middleware('permission:schedule-meeting-types.export,web');
Route::post('/import', [ScheduleMeetingTypeController::class, 'import'])->middleware('permission:schedule-meeting-types.import,web');
Route::post('/bulk-delete', [ScheduleMeetingTypeController::class, 'bulkDestroy'])->middleware('permission:schedule-meeting-types.bulkDestroy,web');
Route::patch('/bulk-status', [ScheduleMeetingTypeController::class, 'bulkUpdateStatus'])->middleware('permission:schedule-meeting-types.bulkUpdateStatus,web');
Route::get('/stats', [ScheduleMeetingTypeController::class, 'stats'])->middleware('permission:schedule-meeting-types.stats,web');
Route::get('/', [ScheduleMeetingTypeController::class, 'index'])->middleware('permission:schedule-meeting-types.index,web');
Route::get('/{scheduleMeetingType}', [ScheduleMeetingTypeController::class, 'show'])->middleware('permission:schedule-meeting-types.show,web');
Route::post('/', [ScheduleMeetingTypeController::class, 'store'])->middleware('permission:schedule-meeting-types.store,web');
Route::put('/{scheduleMeetingType}', [ScheduleMeetingTypeController::class, 'update'])->middleware('permission:schedule-meeting-types.update,web');
Route::patch('/{scheduleMeetingType}', [ScheduleMeetingTypeController::class, 'update'])->middleware('permission:schedule-meeting-types.update,web');
Route::delete('/{scheduleMeetingType}', [ScheduleMeetingTypeController::class, 'destroy'])->middleware('permission:schedule-meeting-types.destroy,web');
Route::patch('/{scheduleMeetingType}/status', [ScheduleMeetingTypeController::class, 'changeStatus'])->middleware('permission:schedule-meeting-types.changeStatus,web');
