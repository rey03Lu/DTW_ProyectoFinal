@extends('backend.menus.superior')

@section('content-admin-css')
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/buttons_estilo.css') }}" rel="stylesheet">
@stop

<!-- estilo de toast -->
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
<!-- estilo de sweet -->
<link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">

<style>
    table {
        /*Ajustar tablas*/
        table-layout: fixed;
    }
</style>

<div id="divcontenedor">
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-sm-12">
                <h1>NASA- Astronomy Picture of the Day</h1>
            </div>
            <br>
            <div class="card border-dark mb-3" style="max-width: 30rem;">
                <div class="card-header">Mostrar APODs</div>
                <div class="card-body">
                    <h5 class="card-title">Seleccione un número si quiere ver APODs aleatorios</h5> <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <form>
                                <div class="form-group">
                                    <label for="apodRange" class="form-label">Cantidad</label>
                                    <input type="range" class="form-range" min="1" max="10"
                                        value="1" id="apodRange"><br>
                                    <output for="apodRange" id="rangeValue" aria-hidden="true"></output>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-outline-dark" id="btnMostrarAPODs">
                                        <i class="fas fa-eye"></i>
                                        Mostrar APODs
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section class="content">
        <div class="container-fluid px-2">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-dark text-white text-center">
                            <h5 class="mb-0">Lista de APODs</h5>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table id="tabla" class="table table-hover table-borderless align-middle text-justified">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 6%">Fecha</th>
                                            <th style="width: 15%">Titulo</th>
                                            <th style="width: 50%">Explicacion</th>
                                            <th style="width: 8%">HD</th>
                                            <th style="width: 5%">Imagen</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyApods">
                                        {{-- Aquí se cargarán las filas dinámicamente --}}

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@extends('backend.menus.footerjs')
@section('archivos-js')

    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/axios.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/alertaPersonalizada.js') }}"></script>

    <script>
        const rangeInput = document.getElementById('apodRange');
        const rangeOutput = document.getElementById('rangeValue');
        // Set initial value
        rangeOutput.textContent = rangeInput.value;
        rangeInput.addEventListener('input', function() {
            rangeOutput.textContent = this.value;
        });
    </script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Asignar el evento click al botón
            document.getElementById('btnMostrarAPODs').addEventListener('click', getApods);
        });


        function getApods() {
            try {
                let apodRange = document.getElementById('apodRange');
                //console.log(apodRange.value);

                // Abrimos dialog de carga
                openLoading('Buscando APODs...');

                // Validamos el rango de APODs a mostrar
                if (apodRange.value > 1 && apodRange.value <= 10) {
                    let formData = new FormData();
                    formData.append('cantidad', apodRange.value);

                    // Hacemos la petición a la API de NASA
                    axios.post('/nasaApod/view/randomApod',
                            formData, {})
                        .then((response) => {
                            console.log("Antes de verificar, en método mayor a 1");
                            verificar(response);
                            closeLoading();
                        })
                        .catch((error) => {
                            toastr.error('No fue posible obtener los APODs');
                            closeLoading();
                        });
                } else {
                    // Hacemos la petición a la API de NASA
                    axios.post('/nasaApod/view/apod', {})
                        .then((response) => {
                            verificar(response);
                            closeLoading();
                        })
                        .catch((error) => {
                            toastr.error('No fue posible obtener los APODs');
                            console.log(error);
                            closeLoading();
                        });
                }
            } catch (error) {
                console.error("Error al obtener APODs:", error);
                toastr.error('Error al obtener APODs');
            }
        }

        // Función para verificar la respuesta de la API
        function verificar(response) {
            if (response.data.success === 0) {
                toastr.error('Validación incorrecta');
            } else if (response.data.success === 1) {
                // Cargamos los datos de la solicitud a la API
                let data = response.data;
                let apodsParaMostrar;

                // Verificamos la estructura de los datos recibidos
                if (Array.isArray(data.apods)) {
                    // Si data.apods es un array (múltiples APODs)
                    console.log("La respuesta contiene un ARRAY de APODs.");
                    apodsParaMostrar = data.apods;
                } else if (typeof data.apods === 'object' && data.apods !== null) {
                    // Si data.apods es un objeto (un solo APOD), lo envolvemos en un array para unificar el tratamiento
                    console.log("La respuesta contiene un OBJETO único de APOD.");
                    apodsParaMostrar = [data.apods];
                } 
                
                let tbody = document.getElementById('tbodyApods');
                tbody.innerHTML = ''; // Limpiamos el tbody antes de agregar 
                const fragment = document.createDocumentFragment();

                if (apodsParaMostrar.length === 0) {
                    // Si no hay APODs para mostrar
                    const row = document.createElement('tr');
                    row.innerHTML = `<td colspan="5" class="text-center">No se encontraron APODs.</td>`;
                    fragment.appendChild(row);
                } else {
                    // Recorremos el array unificado (ya sea de uno o varios APODs)
                    apodsParaMostrar.forEach(apod => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                    <td>${apod.date || 'N/A'}</td>
                    <td>${apod.title || 'N/A'}</td>
                    <td>${apod.explanation || 'N/A'}</td>
                    <td><a href="${apod.hdurl || '#'}" target="_blank">Ver imagen en HD</a></td>
                    <td><a href="${apod.url || '#'}" target="_blank">Ver imagen</a></td>`;
                        fragment.appendChild(row);
                    });
                }

                tbody.appendChild(fragment);
                toastr.success('APODs obtenidos correctamente');

            } else if (response.data.success === 2) {
                toastr.error(response.data.error);
            } else {
                toastr.error('Error desconocido al obtener los APODs');
            }
        }
    </script>


@stop
