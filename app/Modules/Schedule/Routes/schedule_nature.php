<?php

use App\Modules\Schedule\ScheduleNatureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ScheduleNatureController::class, 'index'])->middleware('permission:schedule-natures.index,web');
Route::post('/', [ScheduleNatureController::class, 'store'])->middleware('permission:schedule-natures.store,web');
Route::put('/{scheduleNature}', [ScheduleNatureController::class, 'update'])->middleware('permission:schedule-natures.update,web');
Route::patch('/{scheduleNature}', [ScheduleNatureController::class, 'update'])->middleware('permission:schedule-natures.update,web');
Route::delete('/{scheduleNature}', [ScheduleNatureController::class, 'destroy'])->middleware('permission:schedule-natures.destroy,web');
