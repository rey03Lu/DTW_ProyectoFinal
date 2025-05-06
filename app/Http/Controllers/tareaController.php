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
        return view ('tareas.index', compact('tareas'));
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
        Tarea::create($request->all());
        return redirect()->route('tareas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tarea = Tarea::findOrFail($id);
        return view('tareas.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea = update($request->all());
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
