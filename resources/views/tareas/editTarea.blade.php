<!-- Editar Tareas -->
@extends('layouts.appTareas')
@section('content')
<!-- Encabezado -->
<div class="card">
  <div class="card-header">
    <h3>Editar Tarea</h3>
  </div>
  <div class="card-body" id="formulario-container"></div>
</div>
<!-- JS para los métodos y llamada de formulario.html -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  fetch("/componentes/formulario.html")
    .then(res => res.text())
    .then(html => {
      document.getElementById("formulario-container").innerHTML = html;

      const form = document.getElementById("form-tarea");

      //Obtener y cambiar los valores de la tarea a editar
      form.querySelector('input[name="titulo"]').value = "{{ $tarea->titulo }}";
      form.querySelector('textarea[name="descripcion"]').value = "{{ $tarea->descripcion }}";
      form.querySelector('select[name="estado"]').value = "{{ $tarea->estado }}";
      form.querySelector('#token-field').value = "{{ csrf_token() }}";

      //Cambiar el método para que formulario.html no duplique la tarea
      const url = "{{ route('tareas.update', $tarea->id) }}";
      form.addEventListener("submit", function (e) {
        e.preventDefault();
        const data = new URLSearchParams(new FormData(form));

        fetch(url, {
          method: "POST",
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'X-HTTP-Method-Override': 'PUT'
          },
          body: data
        })
        .then(response => {
          if (response.redirected) {
            window.location.href = response.url;
          } else if (response.ok) {
            window.location.href = "{{ route('tareas.index') }}";
          } else {
            alert("Error al actualizar.");
          }
        })
        .catch(() => alert("Error de conexión"));
      });
    });
});
</script>

@endsection