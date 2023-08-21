<?php

use App\Models\Task as ModelsTask;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view(
        'index',
        [
            'tasks' => ModelsTask::latest()->where('completed', true)->get(),
        ]
    );
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    // $task = collect($tasks)->firstWhere('id', $id);
    // if (!$task) {
    //     abort(Response::HTTP_NOT_FOUND);
    // }

    $task = \App\Models\Task::findOrFail($id);

    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::get('/tasks/{id}/edit', function ($id) {

    $task = \App\Models\Task::findOrFail($id);

    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);
    $task = new ModelsTask;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();
    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task created successfully');
})->name('tasks.store');

Route::put('/tasks/{id}', function ($id, Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);
    $task = ModelsTask::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();
    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task updated successfully');
})->name('tasks.update');

// Route::get('/sss', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!';
// });

// Route::fallback(function () {
//     return 'Still got another';
// });
