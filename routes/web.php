<?php

use App\Http\Controllers\ProfileController;
use App\Models\Prompt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/prompts', function () {
    $prompts = \App\Models\Prompt::query()->get();

    return view('prompts.index', compact('prompts'));
})->middleware('auth', 'can:viewAny,App\Models\Prompt')->name('prompts.index');

Route::get('/prompts/create', function () {
    // Gate::authorize('daldkjbaskjdba', Prompt::class);

    return view('prompts.create');
})->middleware('auth', 'can:daldkjbaskjdba,App\Models\Prompt')->name('prompts.create');

Route::post('/prompts/create', function (Request $request) {
    // Handle prompt creation logic here

    $prompt = new \App\Models\Prompt;
    $prompt->title = $request->input('title');
    $prompt->content = $request->input('content');
    $prompt->is_public = $request->input('is_public', false);
    $prompt->user_id = auth()->id();
    $prompt->save();

    return redirect()->route('prompts.index')->with('success', 'Prompt created successfully!');
})->middleware('auth', 'can:create,App\Models\Prompt')->name('prompts.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/admin', function () {
//     return view('admin');
// })->middleware(['auth', 'can:access-admin-panel'])->name('admin');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'c-role:admin'])->name('admin');
// authenrticated, 2. admin role

require __DIR__.'/auth.php';
