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
    <p><strong>Estado:</strong>
      @if ($tarea->estado == 1)
        Completada
      @elseif ($tarea->estado == 2)
        En proceso
      @else
        Pendiente
      @endif
    </p>
    <p><strong>Fecha de Vencimiento:</strong>
        {{ $tarea->fecha_vencimiento ? \Carbon\Carbon::parse($tarea->fecha_vencimiento)->format('d/m/Y') : 'Sin fecha' }}
    </p>
    <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Volver al listado</a>
  </div>
</div>

@endsection
