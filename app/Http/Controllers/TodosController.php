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
}
