@extends('layouts.appTareas')
@section('content')
<!-- Encabezado -->
<div class="card">
  <div class="card-header">
    <h3>Crear Nueva Tarea</h3>
  </div>
  <div class="card-body" id="formulario-container"></div>
</div>
<!-- JS para manejo de eventos y llamado de formulario.html -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  fetch("/componentes/formulario.html")
    .then(res => res.text())
    .then(html => {
      document.getElementById("formulario-container").innerHTML = html;

      const form = document.getElementById("form-tarea");

      // Agrega el token de Blade al campo oculto del HTML
      document.getElementById("token-field").value = "{{ csrf_token() }}";

      form.addEventListener("submit", function (e) {
        e.preventDefault();

        const data = new URLSearchParams(new FormData(form));

        fetch("{{ route('tareas.store') }}", {
          method: "POST",
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          body: data
        })
        .then(response => {
          if (response.redirected) {
            window.location.href = response.url;
          } else if (response.ok) {
            window.location.href = "{{ route('tareas.index') }}";
          } else {
            alert("Error al guardar.");
          }
        })
        .catch(() => alert("Error de conexión"));
      });
    });
});
</script>

@endsection
