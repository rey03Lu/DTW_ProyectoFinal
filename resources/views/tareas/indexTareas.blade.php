<!-- Listar Tareas usando el mismo estilo que roles y permisos -->
@extends('layouts.appTareas')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Listado de Tareas</h3>
        <a href="{{ route('tareas.create') }}" class="btn btn-success">Crear nueva tarea</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Fecha de Vencimiento</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->titulo }}</td>
                    <td>{{ $tarea->estado ? 'Completada' : 'Pendiente' }}</td>
                    <td>
                        {{ $tarea->fecha_vencimiento ? \Carbon\Carbon::parse($tarea->fecha_vencimiento)->format('d/m/Y') : 'Sin fecha' }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-info btn-sm">Ver</a>
                         @can('editar tareas')
                         <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-primary btn-sm">Editar</a>
                         @endcan
                        <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            @can('eliminar tareas')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta tarea?')">Eliminar</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
