<?php

use App\Modules\Schedule\ScheduleNatureController;
use Illuminate\Support\Facades\Route;

Route::get('/export', [ScheduleNatureController::class, 'export'])->middleware('permission:schedule-natures.export,web');
Route::post('/import', [ScheduleNatureController::class, 'import'])->middleware('permission:schedule-natures.import,web');
Route::post('/bulk-delete', [ScheduleNatureController::class, 'bulkDestroy'])->middleware('permission:schedule-natures.bulkDestroy,web');
Route::patch('/bulk-status', [ScheduleNatureController::class, 'bulkUpdateStatus'])->middleware('permission:schedule-natures.bulkUpdateStatus,web');
Route::get('/stats', [ScheduleNatureController::class, 'stats'])->middleware('permission:schedule-natures.stats,web');
Route::get('/', [ScheduleNatureController::class, 'index'])->middleware('permission:schedule-natures.index,web');
Route::get('/{scheduleNature}', [ScheduleNatureController::class, 'show'])->middleware('permission:schedule-natures.show,web');
Route::post('/', [ScheduleNatureController::class, 'store'])->middleware('permission:schedule-natures.store,web');
Route::put('/{scheduleNature}', [ScheduleNatureController::class, 'update'])->middleware('permission:schedule-natures.update,web');
Route::patch('/{scheduleNature}', [ScheduleNatureController::class, 'update'])->middleware('permission:schedule-natures.update,web');
Route::delete('/{scheduleNature}', [ScheduleNatureController::class, 'destroy'])->middleware('permission:schedule-natures.destroy,web');
Route::patch('/{scheduleNature}/status', [ScheduleNatureController::class, 'changeStatus'])->middleware('permission:schedule-natures.changeStatus,web');
