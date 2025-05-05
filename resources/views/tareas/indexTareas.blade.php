<!-- Listar Tareas -->
@extends('layouts.app')
@section('content')
<h1>Listado de Tareas</h1>
<a href="{{ route('tareas.create') }}">Crear nueva tarea</a>
<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tareas as $tarea)
        <tr>
            <td>{{ $tarea->titulo }}</td>
            <td>{{ $tarea->estado ? 'Completada' : 'Pendiente' }}</td>
            <td>
                <a href="{{ route('tareas.show', $tarea) }}">Ver</a>
                <a href="{{ route('tareas.edit', $tarea) }}">Editar</a>
                <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection