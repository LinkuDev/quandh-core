<?php

use App\Modules\Core\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/export', [DepartmentController::class, 'export'])->middleware('permission:departments.export,web');
Route::post('/import', [DepartmentController::class, 'import'])->middleware('permission:departments.import,web');
Route::post('/bulk-delete', [DepartmentController::class, 'bulkDestroy'])->middleware('permission:departments.bulkDestroy,web');
Route::patch('/bulk-status', [DepartmentController::class, 'bulkUpdateStatus'])->middleware('permission:departments.bulkUpdateStatus,web');
Route::get('/stats', [DepartmentController::class, 'stats'])->middleware('permission:departments.stats,web');
Route::get('/tree', [DepartmentController::class, 'tree'])->middleware('permission:departments.tree,web');
Route::get('/', [DepartmentController::class, 'index'])->middleware('permission:departments.index,web');
Route::get('/{department}', [DepartmentController::class, 'show'])->middleware('permission:departments.show,web');
Route::post('/', [DepartmentController::class, 'store'])->middleware('permission:departments.store,web');
Route::put('/{department}', [DepartmentController::class, 'update'])->middleware('permission:departments.update,web');
Route::patch('/{department}', [DepartmentController::class, 'update'])->middleware('permission:departments.update,web');
Route::delete('/{department}', [DepartmentController::class, 'destroy'])->middleware('permission:departments.destroy,web');
Route::patch('/{department}/status', [DepartmentController::class, 'changeStatus'])->middleware('permission:departments.changeStatus,web');
