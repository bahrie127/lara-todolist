<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task as ModelsTask;
use Illuminate\Console\View\Components\Task;
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
            'tasks' => ModelsTask::latest()->paginate(5),
        ]
    );
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}', function (ModelsTask $task) {
    // $task = collect($tasks)->firstWhere('id', $id);
    // if (!$task) {
    //     abort(Response::HTTP_NOT_FOUND);
    // }

    // $task = \App\Models\Task::findOrFail($id);

    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (ModelsTask $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::post('/tasks', function (TaskRequest $request) {
    // $data = $request->validate([
    //     'title' => 'required|max:255',
    //     'description' => 'required',
    //     'long_description' => 'required',
    // ]);
    // $data = request()->validated();
    // $task = new ModelsTask;
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];

    // $task->save();

    $task = ModelsTask::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function (ModelsTask $task, TaskRequest $request) {
    // $data = request()->validated();
    // // $task = ModelsTask::findOrFail($id);
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];

    // $task->save();
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully');
})->name('tasks.update');


Route::delete('/task/{task}', function (ModelsTask $task) {
    $task->delete();
    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully');
})->name('tasks.destroy');
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
