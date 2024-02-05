<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

use App\Jobs\DeleteTasksJob;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get("/", function () {
    return redirect()->route("tasks.show");
});

Route::get("/tasks", function () {
    return view("tasks", [
        // "tasks"=> \App\Models\Task::orderBy("id","asc")->get()
        // "tasks"=> \App\Models\Task::all()
        // "tasks"=> \App\Models\Task::latest("created_at")->where("completed", true)->get()
        "tasks"=> Task::latest()->get()
    ]);
})->name("tasks.show");

/* Route::get("/tasks/{id}", function ($id) use ($tasks) {
  $task = collect($tasks)->firstWhere("id", $id);

  if (!$task) {
    abort(Response::HTTP_NOT_FOUND);
  }
  return view("task", [
      "task"=> $task
  ]);
})->name("tasks.index"); */

Route::get('tasks/{id}', function($id){
  return view('task', [
    // 'task' => \App\Models\Task::find($id)
    'task' => Task::findOrFail($id)
  ]);
})->name('tasks.index');

Route::get('/hello', function () {
    return "Hello";
})->name('hello');

Route::get('/hallo', function () {
    return redirect()->route('hello');
});

Route::get("/greet/{name}", function ($name) {
    return "Hello " . $name. "!";
});

Route::fallback(function () {
    return redirect()->route("tasks.index");
});

Route::delete("/tasks/{task}", function(Task $task){
  $task->delete();

  return redirect()->route("tasks.index")
    ->with("success", "Task deleted successfully!");
})->name("task.destroy");