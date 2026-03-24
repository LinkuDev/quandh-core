<?php

use App\Modules\Schedule\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/export', [ScheduleController::class, 'export'])->middleware('permission:schedules.export,web');
Route::get('/export-pdf', [ScheduleController::class, 'exportPdf'])->middleware('permission:schedules.exportPdf,web');
Route::post('/import', [ScheduleController::class, 'import'])->middleware('permission:schedules.import,web');
Route::post('/bulk-delete', [ScheduleController::class, 'bulkDestroy'])->middleware('permission:schedules.bulkDestroy,web');
Route::patch('/bulk-status', [ScheduleController::class, 'bulkUpdateStatus'])->middleware('permission:schedules.bulkUpdateStatus,web');
Route::get('/stats', [ScheduleController::class, 'stats'])->middleware('permission:schedules.stats,web');
Route::get('/', [ScheduleController::class, 'index'])->middleware('permission:schedules.index,web');
Route::get('/{schedule}', [ScheduleController::class, 'show'])->middleware('permission:schedules.show,web');
Route::post('/', [ScheduleController::class, 'store'])->middleware('permission:schedules.store,web');
Route::put('/{schedule}', [ScheduleController::class, 'update'])->middleware('permission:schedules.update,web');
Route::patch('/{schedule}', [ScheduleController::class, 'update'])->middleware('permission:schedules.update,web');
Route::delete('/{schedule}', [ScheduleController::class, 'destroy'])->middleware('permission:schedules.destroy,web');
Route::patch('/{schedule}/status', [ScheduleController::class, 'changeStatus'])->middleware('permission:schedules.changeStatus,web');
Route::patch('/{schedule}/move-up', [ScheduleController::class, 'moveUp'])->middleware('permission:schedules.reorder,web');
Route::patch('/{schedule}/move-down', [ScheduleController::class, 'moveDown'])->middleware('permission:schedules.reorder,web');
Route::patch('/{schedule}/insert-above', [ScheduleController::class, 'insertAbove'])->middleware('permission:schedules.reorder,web');
Route::patch('/{schedule}/insert-below', [ScheduleController::class, 'insertBelow'])->middleware('permission:schedules.reorder,web');
