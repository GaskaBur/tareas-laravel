<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    //Poner la tipo Request es obligatoria.
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea creada');

    }

    //Obtener todos los elementos
    public function index() {
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
    }

    public function show($id) {
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo]);
    }

    public function update(Request $request, $id) {
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();
        //return view('todos.index', ['success' => 'Tarea actualizada']);
        return redirect()->route('todos')->with('success', 'Tarea actualizada ');
    }

    public function destroy($id) {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Tarea eliminada');
    }
}
