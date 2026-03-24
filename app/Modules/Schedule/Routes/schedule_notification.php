<?php

use App\Modules\Schedule\ScheduleNotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/unread-count', [ScheduleNotificationController::class, 'unreadCount']);
Route::get('/', [ScheduleNotificationController::class, 'index']);
Route::patch('/{scheduleNotification}/read', [ScheduleNotificationController::class, 'markRead']);
Route::patch('/read-all', [ScheduleNotificationController::class, 'markAllRead']);
