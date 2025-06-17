<!-- Crear Tareas -->
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
    <button type="submit">Guardar</button>
</form>
@endsection