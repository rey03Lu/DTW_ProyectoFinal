@extends('backend.menus.superior')

@section('content-admin-css')
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/buttons_estilo.css') }}" rel="stylesheet">
@stop

<style>
    table {
        /*Ajustar tablas*/
        table-layout: fixed;
    }
</style>

<div id="divcontenedor" style="display: none">
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-sm-12">
                <h1>NASA- Astronomy Picture of the Day</h1>
            </div>
            <br>
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Mostrar APODs</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Seleccione un número si quiere ver más APODs</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customRange4" class="form-label">Example range</label>
                                    <input type="range" class="form-range" min="0" max="100"
                                        value="50" id="customRange4">
                                    <output for="customRange4" id="rangeValue" aria-hidden="true"></output>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Lista</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="tablaDatatable"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@extends('backend.menus.footerjs')
@section('archivos-js')

    <script>
        const rangeInput = document.getElementById('customRange4');
        const rangeOutput = document.getElementById('rangeValue');
        // Set initial value
        rangeOutput.textContent = rangeInput.value;
        rangeInput.addEventListener('input', function() {
            rangeOutput.textContent = this.value;
        });
    </script>


@stop
