<!-- Editar Tareas -->
@extends('layouts.appTareas')
@section('content')
<h1>Editar Tarea</h1>
<form action="{{ route('tareas.update', $tarea) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $tarea->titulo) }}" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $tarea->descripcion) }}</textarea>
    </div>
    <div class="form-group">
        <label for="estado">Estado:</label>
        <select name="estado" id="estado" class="form-control">
            <option value="0" {{ !$tarea->estado ? 'selected' : '' }}>Pendiente</option>
            <option value="1" {{ $tarea->estado ? 'selected' : '' }}>Completada</option>
        </select>
    </div>
    <div class="form-group">
        <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
        <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="{{ old('fecha_vencimiento', $tarea->fecha_vencimiento) }}">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
