<!-- Mostrar Tareas -->
@extends('layouts.appTareas')
@section('content')

<div class="card">
  <div class="card-header">
    <h3>Detalle de Tarea</h3>
  </div>
  <div class="card-body">
    <p><strong>Título:</strong> {{ $tarea->titulo }}</p>
    <p><strong>Descripción:</strong> {{ $tarea->descripcion }}</p>
    <p><strong>Estado:</strong> {{ $tarea->estado ? 'Completada' : 'Pendiente' }}</p>
    <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Volver al listado</a>
  </div>
</div>

@endsection