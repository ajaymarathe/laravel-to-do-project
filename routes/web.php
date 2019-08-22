<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. 

| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use \App\Task;

//show all task.
Route::get('/', function () {

    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', ['tasks' => $tasks]);
});

//create new task
Route::post('/task', function (Request $request) {

    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) { 
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    // Create The Task...

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');

});

//delete the task.
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();
    return redirect('/');
});


Route::get('/edit/{id}', function($id) {

    $tasks = Task::where('id', $id)->get();
    return view('edit', ['tasks' => $tasks]);
});

Route::post('/edit/{id}', function(Request $request){

    // return $request->all();
    $task = Task::find($request->id);

    $task->name = $request->name;

    $task->save();

    return redirect('/');
});



