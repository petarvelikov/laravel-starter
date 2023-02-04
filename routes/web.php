<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home')->with('status','Data added Successfully');
});

Route::resource('todos', TodoController::class);

// Ajax - edit inline todo
Route::get('/ajax-todo-edit', function() {
    $editedTodoId = $_GET['editedTodoId'];
    $editedTodoTitle = $_GET['editedTodoTitle'];
    $editedTodoDescription = $_GET['editedTodoDescription'];
    $editedTodoExecuted = $_GET['editedTodoExecuted'];

    DB::table('todos')->where('id', $editedTodoId)->update([
        'title' => $editedTodoTitle,
        'description' => $editedTodoDescription,
        'executed' => $editedTodoExecuted,
    ]);

    return redirect('todos')->with('success', 'Записът е променен успешно.');
});
