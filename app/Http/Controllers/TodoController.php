<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use DB;

class TodoController extends Controller
{
    public function index()
    {
        $todos = DB::table('todos')->get();

        return view('todos.index')->with('todos', $todos);
    }


    public function create()
    {
        return view('todos.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:todos|min:3|max:55',
            'description' => 'nullable|max:255',
            'expired_data' => 'required|date'
        ]);

        $todo = Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'expired_data' => $request->expired_data,
            'executed' => 0
        ]);

        return redirect('todos')->with('success','Todo has been created successfully.');
    }


    public function show($id)
    {
        $todo = Todo::findOrFail($id);

        return view('todos.show')->with('todo', $todo);
    }


    public function edit($id)
    {
        abort(404);
    }


    public function update(Request $request, $id)
    {
        abort(404);
    }


    public function destroy($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->delete();

            return redirect('todos')->with('success', 'Записът е изтрит успешно.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('todos')->with('warning', 'Записът не може да бъде изтрит.');
        }
    }

}
