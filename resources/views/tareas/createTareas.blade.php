@extends('layouts.appTareas')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
      document.getElementById("token-field").value = "{{ csrf_token() }}";

      form.addEventListener("submit", function (e) {
        e.preventDefault();

        // Limpia errores anteriores
        let errorDiv = document.querySelector('.alert-danger');
        if (errorDiv) errorDiv.remove();

        const data = new URLSearchParams(new FormData(form));

        fetch("{{ route('tareas.store') }}", {
          method: "POST",
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          body: data
        })
        .then(async response => {
          if (response.redirected) {
            window.location.href = response.url;
          } else if (response.status === 422) {
            // Errores de validación
            const result = await response.json();
            let errorHtml = '<div class="alert alert-danger"><ul>';
            Object.values(result.errors).forEach(msgArr => {
              msgArr.forEach(msg => errorHtml += `<li>${msg}</li>`);
            });
            errorHtml += '</ul></div>';
            document.querySelector('.card').insertAdjacentHTML('afterbegin', errorHtml);
          } else {
            alert("Error al crear la tarea.");
          }
        })
        .catch(() => alert("Error de conexión"));
      });
    });
});
</script>

@endsection
