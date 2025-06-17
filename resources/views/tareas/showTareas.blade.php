@extends('layouts.appTareas')

@section('content')
<div class="container mt-4">
    <h2>Detalles de la Tarea</h2>

    <div>
        <strong>Título:</strong>
        <p>{{ $tarea->titulo }}</p>
    </div>

    <div>
        <strong>Descripción:</strong>
        <p>{{ $tarea->descripcion }}</p>
    </div>

    <div>
        <strong>Estado:</strong>
        <p>{{ $tarea->estado ? 'Completada' : 'Pendiente' }}</p>
    </div>

    <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection