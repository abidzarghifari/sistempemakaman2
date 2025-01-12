<?php

use App\Http\Controllers\Catattamucontroller;
use App\Http\Controllers\MakamController;
use App\Http\Controllers\kasController;
use App\Http\Controllers\pengurusController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('about');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/aboutmakam', function () {
    return view('aboutmakam');
})->name('aboutmakam');

Route::controller(CatattamuController::class)->group(function () {
        Route::get('/pencatatantamu', 'index')->name('pencatatantamu');
        Route::post('/pencatatantamu/store', 'store')->name('pencatatantamu.store');
});

Route::group([], function () {
    Route::get('/pencarianmakam', [MakamController::class, 'index2'])->name('pencarianmakam');
    Route::get('/pencarianmakam/lihat/{id}', [MakamController::class, 'index3'])->name('pencarianmakam.lihat');
});


Route::get('/accountprofile', [ProfileController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('accountprofile');

Route::middleware('auth')->group(function () {
        Route::get('/manajemenmakam', [MakamController::class, 'index'])->name('manajemenmakam');
        Route::get('/manajemenmakam/edit/{id}', [MakamController::class, 'edit'])->name('manajemenmakam.edit');
        Route::patch('/manajemenmakam/update/{id}', [MakamController::class, 'update'])->name('manajemenmakam.update');
        Route::get('manajemenmakam/create', [MakamController::class, 'create'])->name('manajemenmakam.create');
        Route::post('manajemenmakam/store', [MakamController::class, 'store'])->name('manajemenmakam.store');
        Route::delete('/manajemenmakam/destroy/{id}', [MakamController::class, 'destroy'])->name('manajemenmakam.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/manajemenpengurus', [pengurusController::class, 'index'])->name('manajemenpengurus');
    Route::get('/manajemenpengurus/edit/{id}', [pengurusController::class, 'edit'])->name('manajemenpengurus.edit');
    Route::delete('/manajemenpengurus/destroy/{id}', [pengurusController::class, 'destroy'])->name('manajemenpengurus.destroy');
});

Route::middleware('auth')->group(function () {
        Route::get('/manajemenkas', [kasController::class, 'index'])->name('manajemenkas');
        Route::get('/manajemenkas/edit/{id}', [kasController::class, 'edit'])->name('manajemenkas.edit');
        Route::patch('/manajemenkas/update/{id}', [kasController::class, 'update'])->name('manajemenkas.update');
        Route::get('manajemenkas/create', [kasController::class, 'create'])->name('manajemenkas.create');
        Route::post('manajemenkas/store', [kasController::class, 'store'])->name('manajemenkas.store');
        Route::delete('/manajemenkas/destroy/{id}', [kasController::class, 'destroy'])->name('manajemenkas.destroy');
});


Route::resource('/manajementamu', TamuController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified'])
    ->names(['index' => 'manajementamu']);;
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 

require __DIR__.'/auth.php';
