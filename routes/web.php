<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsController;


Route::get('/', function () {
    return view('index');
});


Route::post('apply',[JobsController::class, 'save']);


Route::get('admin/edit/{id}', [JobsController::class, 'edit'])->middleware(['auth'])->name('admin');
Route::post('admin/edit/comment/{id}', [JobsController::class, 'comment'])->middleware(['auth'])->name('admin');
Route::post('admin/edit/update/{id}', [JobsController::class, 'update'])->middleware(['auth'])->name('admin');
Route::post('admin/edit/delete/{id}', [JobsController::class, 'delete'])->middleware(['auth'])->name('admin');
Route::get('/admin', [JobsController::class, 'show'])->middleware(['auth'])->name('admin');



Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('storage/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});




require __DIR__.'/auth.php';
