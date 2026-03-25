<?php

use App\Modules\Schedule\ScheduleMeetingTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ScheduleMeetingTypeController::class, 'index'])->middleware('permission:schedule-meeting-types.index,web');
Route::post('/', [ScheduleMeetingTypeController::class, 'store'])->middleware('permission:schedule-meeting-types.store,web');
Route::put('/{scheduleMeetingType}', [ScheduleMeetingTypeController::class, 'update'])->middleware('permission:schedule-meeting-types.update,web');
Route::patch('/{scheduleMeetingType}', [ScheduleMeetingTypeController::class, 'update'])->middleware('permission:schedule-meeting-types.update,web');
Route::delete('/{scheduleMeetingType}', [ScheduleMeetingTypeController::class, 'destroy'])->middleware('permission:schedule-meeting-types.destroy,web');
