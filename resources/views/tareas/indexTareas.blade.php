<!-- Listar Tareas -->
@extends('layouts.appTareas')
@section('content')
<h1>Listado de Tareas</h1>
<a href="{{ route('tareas.create') }}">Crear nueva tarea</a>
<table class="table">
    <thead>
        <tr>
            <th>Título</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Fecha de Vencimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tareas as $tarea)
        <tr>
            <td>{{ $tarea->titulo }}</td>
            <td>{{ $tarea->descripcion }}</td>
            <td>{{ $tarea->estado ? 'Completada' : 'Pendiente' }}</td>
            <td>
                {{ $tarea->fecha_vencimiento ? \Carbon\Carbon::parse($tarea->fecha_vencimiento)->format('d/m/Y') : 'Sin fecha' }}
            </td>
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
