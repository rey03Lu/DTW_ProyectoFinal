<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Agregar modelo Tarea
use App\Models\Tarea;

class tareaController extends Controller
{
    /**
     * Display a listing of the resource.
     * Creado con: php artisan make:controller tareaController --resource, ya proporcionó las funciones
     */
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.indexTareas', ['tareas' => $tareas,'titulo' => 'Listado de Tareas']);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('tareas.createTareas');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'fecha_vencimiento' => 'nullable|date|after_or_equal:today',
        ], [
            'fecha_vencimiento.after_or_equal' => 'No se puede crear la tarea: la fecha de vencimiento no puede ser anterior al día de hoy.',
        ]);

        Tarea::create($request->all());
        return redirect()->route('tareas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tarea = Tarea::findOrFail($id);
        return view('tareas.showTareas', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tarea = Tarea::findOrFail($id);
        return view('tareas.editTarea', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required',
            'fecha_vencimiento' => 'nullable|date',
        ]);

        $tarea = Tarea::findOrFail($id);
        $tarea->update($request->all());
        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tarea::findOrFail($id)->delete();
        return redirect()->route('tareas.index');
    }
}
