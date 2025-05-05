<!-- Editar Tareas -->
@extends('layouts.app')
@section('content')
<h1>Editar Tarea</h1>
<form action="{{ route('tareas.update', $tarea) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Título:</label>
    <input type="text" name="titulo" value="{{ $tarea->titulo }}" required>
    <label>Descripción:</label>
    <textarea name="descripcion">{{ $tarea->descripcion }}</textarea>
    <label>Estado:</label>
    <select name="estado">
        <option value="0" {{ !$tarea->estado ? 'selected' : '' }}>Pendiente</option>
        <option value="1" {{ $tarea->estado ? 'selected' : '' }}>Completada</option>
    </select>
    <button type="submit">Actualizar</button>
</form>
@endsection