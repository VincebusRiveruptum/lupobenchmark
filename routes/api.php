<?php

use App\Http\Controllers\CpuController;
use App\Http\Controllers\CpuSocketController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\GpuController;
use App\Http\Controllers\ManufacturerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/cpu', [CpuController::class, 'index'])->name('cpu.index');
    Route::post('/cpu', [CpuController::class, 'store'])->name('cpu.store');
    Route::get('/cpu/{cpu}', [CpuController::class, 'show'])->name('cpu.show');
    Route::delete('/cpu/{cpu}', [CpuController::class, 'destroy'])->name('cpu.destroy');
    Route::patch('/cpu/{cpu}', [CpuController::class, 'update'])->name('cpu.update');

    Route::apiResource('/cpu-sockets', CpuSocketController::class);
    Route::apiResource('/manufacturers', ManufacturerController::class);
    Route::apiResource('/gpu', GpuController::class);
    Route::apiResource('/families', FamilyController::class);
});
