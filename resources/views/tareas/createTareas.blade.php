@extends('layouts.appTareas')
@section('content')
<h1>Crear Nueva Tarea</h1>
<form action="{{ route('tareas.store') }}" method="POST">
    @csrf
    <label>Título:</label>
    <input type="text" name="titulo" required>
    <label>Descripción:</label>
    <textarea name="descripcion"></textarea>
    <label>Estado:</label>
    <select name="estado">
        <option value="0" selected>Pendiente</option>
        <option value="1">Completada</option>
    </select>
    <div class="form-group">
        <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
        <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="{{ old('fecha_vencimiento') }}">
    </div>
    <button type="submit">Guardar</button>
</form>
@endsection
