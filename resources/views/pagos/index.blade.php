@extends('layout.app')
@section('content')
<main class="app-main"> <!--begin::App Content Header-->
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 my-5">
                    <div class="px-2 row">
                        <div class="col-lg-12">
                            @include('flash::message')
                        </div>
                        <div class="col-md-6 col-6">
                            <h3 class="p-2 bold">Historial de Pagos</h3>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exportModal">
                                    Exportar Pagos
                                </button>


                            </div>
                    </div>
                    <div class="card-body">
                  
                        @include('pagos.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main> <!--end::App Main--> <!--begin::Footer-->


<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="exportModalLabel">Exportar Pagos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Cuerpo del modal con el formulario -->
            <div class="modal-body">
                <form action="{{ route('pagos.export') }}" method="GET">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="start_date">Inicio:</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" required>
                        </div>

                        <div class="col-md-6">
                            <label for="end_date">Fin:</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" required>
                        </div>
                    </div>

                    <!-- Botón de exportación -->
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Exportar</button>
                    </div>
                </form>
            </div>

            <!-- Pie del modal -->
            
        </div>
    </div>
</div>
@endsection
