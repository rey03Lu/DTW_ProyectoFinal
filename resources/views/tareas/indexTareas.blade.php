@extends('layouts.appTareas')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Listado de Tareas</h3>
        <a href="{{ route('tareas.create') }}" class="btn btn-success">Crear nueva tarea</a>
    </div>
    <div class="card-body">
        <!-- Input de búsqueda -->
        <div class="mb-3">
            <input id="buscarTarea" type="text" class="form-control" placeholder="Buscar tareas por título, estado o fecha...">
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Fecha de Vencimiento</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaTareas">
                @foreach($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->titulo }}</td>
                    <td>
                        @if($tarea->estado == 1)
                            <span class="badge bg-success">Completada</span>
                        @elseif($tarea->estado == 2)
                            <span class="badge bg-info text-dark">En proceso</span>
                        @else
                            <span class="badge bg-warning text-dark">Pendiente</span>
                        @endif
                    </td>
                    <td>
                        {{ $tarea->fecha_vencimiento ? \Carbon\Carbon::parse($tarea->fecha_vencimiento)->format('d/m/Y') : 'Sin fecha' }}
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalTarea{{ $tarea->id }}">Ver</button>
                        <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta tarea?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <!-- Modal individual para cada tarea -->
                <div class="modal fade" id="modalTarea{{ $tarea->id }}" tabindex="-1" aria-labelledby="modalTareaLabel{{ $tarea->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="modalTareaLabel{{ $tarea->id }}">Detalle de la tarea</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                        <p><strong>Título:</strong> {{ $tarea->titulo }}</p>
                        <p><strong>Descripción:</strong> {{ $tarea->descripcion }}</p>
                        <p><strong>Estado:</strong>
                            @if($tarea->estado == 1)
                                <span class="badge bg-success">Completada</span>
                            @elseif($tarea->estado == 2)
                                <span class="badge bg-info text-dark">En proceso</span>
                            @else
                                <span class="badge bg-warning text-dark">Pendiente</span>
                            @endif
                        </p>
                        <p><strong>Fecha de Vencimiento:</strong>
                            {{ $tarea->fecha_vencimiento ? \Carbon\Carbon::parse($tarea->fecha_vencimiento)->format('d/m/Y') : 'Sin fecha' }}
                        </p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Script para búsqueda en tabla -->
<script>
    document.getElementById('buscarTarea').addEventListener('keyup', function() {
        let filtro = this.value.toLowerCase();
        let filas = document.querySelectorAll('#tablaTareas tr');

        filas.forEach(fila => {
            let textoFila = fila.textContent.toLowerCase();
            fila.style.display = textoFila.includes(filtro) ? '' : 'none';
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
      const modal = new bootstrap.Modal(document.getElementById('detalleTareaModal'));

      document.querySelectorAll('.btn-ver-tarea').forEach(button => {
        button.addEventListener('click', function() {
          const tareaId = this.getAttribute('data-id');

          fetch(`/tareas/${tareaId}`) // Ruta show de la tarea (AJAX)
            .then(response => response.json())
            .then(data => {
              document.getElementById('modal-titulo').textContent = data.titulo;
              document.getElementById('modal-descripcion').textContent = data.descripcion || 'Sin descripción';

              const estadoSpan = document.getElementById('modal-estado');
              if(data.estado) {
                estadoSpan.textContent = 'Completada';
                estadoSpan.className = 'badge bg-success';
              } else {
                estadoSpan.textContent = 'Pendiente';
                estadoSpan.className = 'badge bg-warning text-dark';
              }

              document.getElementById('modal-fecha').textContent = data.fecha_vencimiento || 'Sin fecha';

              modal.show();
            })
            .catch(err => {
              alert('Error al cargar la tarea');
              console.error(err);
            });
        });
      });
    });
</script>


@endsection
