<?php

use App\Modules\Schedule\ScheduleController;
use Illuminate\Support\Facades\Route;

/*
 * Permission dùng pipe (|) để cho phép user có quyền ở BẤT KỲ module nào
 * (thuong-truc-schedules HOẶC van-phong-schedules) đều truy cập được.
 */

Route::get('/export', [ScheduleController::class, 'export'])->middleware('permission:thuong-truc-schedules.export|van-phong-schedules.export,web');
Route::get('/export-pdf', [ScheduleController::class, 'exportPdf'])->middleware('permission:thuong-truc-schedules.exportPdf|van-phong-schedules.exportPdf,web');
Route::post('/import', [ScheduleController::class, 'import'])->middleware('permission:thuong-truc-schedules.import|van-phong-schedules.import,web');
Route::post('/bulk-delete', [ScheduleController::class, 'bulkDestroy'])->middleware('permission:thuong-truc-schedules.bulkDestroy|van-phong-schedules.bulkDestroy,web');
Route::patch('/bulk-status', [ScheduleController::class, 'bulkUpdateStatus'])->middleware('permission:thuong-truc-schedules.bulkUpdateStatus|van-phong-schedules.bulkUpdateStatus,web');
Route::get('/stats', [ScheduleController::class, 'stats'])->middleware('permission:thuong-truc-schedules.stats|van-phong-schedules.stats,web');
Route::get('/', [ScheduleController::class, 'index'])->middleware('permission:thuong-truc-schedules.index|van-phong-schedules.index,web');
Route::post('/', [ScheduleController::class, 'store'])->middleware('permission:thuong-truc-schedules.store|van-phong-schedules.store,web');

// Reorder routes — PHẢI đặt trước /{schedule} để không bị match nhầm
Route::patch('/{schedule}/move-up', [ScheduleController::class, 'moveUp'])->middleware('permission:thuong-truc-schedules.reorder|van-phong-schedules.reorder,web');
Route::patch('/{schedule}/move-down', [ScheduleController::class, 'moveDown'])->middleware('permission:thuong-truc-schedules.reorder|van-phong-schedules.reorder,web');
Route::patch('/{schedule}/insert-above', [ScheduleController::class, 'insertAbove'])->middleware('permission:thuong-truc-schedules.reorder|van-phong-schedules.reorder,web');
Route::patch('/{schedule}/insert-below', [ScheduleController::class, 'insertBelow'])->middleware('permission:thuong-truc-schedules.reorder|van-phong-schedules.reorder,web');
Route::patch('/{schedule}/status', [ScheduleController::class, 'changeStatus'])->middleware('permission:thuong-truc-schedules.changeStatus|van-phong-schedules.changeStatus,web');

Route::get('/{schedule}', [ScheduleController::class, 'show'])->middleware('permission:thuong-truc-schedules.show|van-phong-schedules.show,web');
Route::put('/{schedule}', [ScheduleController::class, 'update'])->middleware('permission:thuong-truc-schedules.update|van-phong-schedules.update,web');
Route::patch('/{schedule}', [ScheduleController::class, 'update'])->middleware('permission:thuong-truc-schedules.update|van-phong-schedules.update,web');
Route::delete('/{schedule}', [ScheduleController::class, 'destroy'])->middleware('permission:thuong-truc-schedules.destroy|van-phong-schedules.destroy,web');
