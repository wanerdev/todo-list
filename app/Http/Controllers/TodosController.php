<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Index para mostrar todos los elementos
     * Store para guarfar un todo
     * Update para actualizar un todo
     * destroy para eliminar un todo
     * edit para mostrar el formulario de edicion
     */

     public function store(Request $request) {

        //Validamos
        $request->validate([
            'title' => 'required | min:3'
        ]);

        //Creamos los objetos
        $todo = new Todo;
        //Asignamos los valores
        $todo -> title = $request->title;
        //Guardamos
        $todo->save();

        //Redirigimos al usuario, e inyectamos el mensaje
        return redirect()->route('todos')->with('success', 'Tarea creada correctamente');
     }

     public function index() {
         $todos = Todo::all();
         return view('todos.index', ['todos' =>  $todos ]);
     }

     public function show($id) {
        $todo = Todo::find($id);
        return view('todos.show',['todo'=> $todo]);
     }

     public function update(Request $request, $id) {
        $todo = Todo::find($id);
        $todo -> title = $request->title;
        $todo->save();
        //return view('todos.index', ['success'=> 'Tarea actualizada correctamente !']);

        return redirect() -> route('todos')->with('success', 'Tarea actualizada correctamente !');
    }

    public function destroy($id) {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect() -> route('todos')->with('success', 'Tarea eliminada correctamente !');
    }
}
