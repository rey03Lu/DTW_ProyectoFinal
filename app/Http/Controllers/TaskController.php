<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Task::class); // Control de permisos
        // lo que sucede es que tengo en modo pruebas el middleware de auth y no me deja ver la vista
        // $tasks = Task::where('user_id', auth()->id())->get();
        $tasks = Task::all(); // Mostrar todas las tareas temporalmente para pruebas
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Task::class); // Control de permisos

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'user_id' => auth()->id(),
        ]);

        return response()->json($task, 201);
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task); // Control de permisos
        return response()->json($task);
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task); // Control de permisos

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task); // Control de permisos
        $task->delete();

        return response()->json(['message' => 'Tarea eliminada con éxito.'], 204);
    }
}
