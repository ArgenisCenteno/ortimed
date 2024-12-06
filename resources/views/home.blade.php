@extends('layout.app')
@section('content')
<style>
    /* card*/
    /* From Uiverse.io by Yaya12085 */
    .card-dash {
        padding: 1rem;

        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        max-width: 320px;
        border-radius: 20px;
    }

    .title {
        display: flex;
        align-items: center;
    }

    .title span {
        position: relative;
        padding: 0.5rem;

        width: 1.5rem;
        height: 1.5rem;
        border-radius: 9999px;
    }

    .title span i {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        height: 1rem;
    }

    .title-text {
        margin-left: 0.5rem;
        color: #f7f7f7;
        font-size: 18px;
    }

    .percent {
        margin-left: 0.5rem;
        color: #02972f;
        font-weight: 600;
        display: flex;
    }

    .data {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .data p {
        margin-top: 1rem;
        margin-bottom: 1rem;
        color: #e7e7e7;
        font-size: 1.25rem;
        line-height: 2.5rem;
        font-weight: 700;
        text-align: left;
    }

    .data .range {
        position: relative;
        background-color: #E5E7EB;
        width: 100%;
        height: 0.5rem;
        border-radius: 0.25rem;
    }

    .data .range .fill {
        position: absolute;
        top: 0;
        left: 0;
        background-color: #1083b9;
        width: 76%;
        height: 100%;
        border-radius: 0.25rem;
    }
</style>
<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Ortimet Restaurant C.A</h3>
                </div>
                <div class="col-sm-6">
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row"> <!--begin::Combined Small Box Widget-->
                <div class="col-lg-12"> <!-- Full width for the combined box -->
                    <div class=" "> <!-- Light background for the combined box -->
                        <div class="inner">
                            <div class="row mt-4">
                                <div class="row"> <!--begin::Col-->
                                    <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
                                        <div class="small-box bg-primary-app">
                                            <div class="inner">
                                                <h3>{{$ventas}}</h3>
                                                <p>Ventas</p>
                                            </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path
                                                    d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z">
                                                </path>
                                            </svg> <a href="{{route('ventas.index')}}"
                                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                                Ver más <i class="bi bi-link-45deg"></i> </a>
                                        </div> <!--end::Small Box Widget 1-->
                                    </div> <!--end::Col-->

                                    <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 3-->
                                        <div class="small-box  bg-sky-app">
                                            <div class="inner">
                                                <h3>{{$compras}}</h3>
                                                <p>Compras</p>
                                            </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path
                                                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                                </path>
                                            </svg> <a href="{{route('usuarios.index')}}"
                                                class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                                Ver más <i class="bi bi-link-45deg"></i> </a>
                                        </div> <!--end::Small Box Widget 3-->
                                    </div> <!--end::Col-->
                                    <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 4-->
                                        <div class="small-box bg-success-app">
                                            <div class="inner">
                                                <h3>{{$deudas}}</h3>
                                                <p>Deudas</p>
                                            </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                    d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z">
                                                </path>
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                    d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z">
                                                </path>
                                            </svg> <a href="{{route('almacen')}}"
                                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                                Ver más <i class="bi bi-link-45deg"></i> </a>
                                        </div> <!--end::Small Box Widget 4-->
                                    </div> <!--end::Col-->

                                    <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 8-->
                                        <div class="small-box text-bg-primary">
                                            <div class="inner">
                                                <h3>{{$pendientes}}</h3>
                                                <p>Cuentas Por Cobrar</p>
                                            </div>
                                            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path d="M3 6h18v12H3zM2 4v16h20V4H2zm10 5h5v1h-5v-1zm0 2h7v1h-7v-1z">
                                                </path>
                                            </svg>
                                            <a href="{{route('pagos.index')}}"
                                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                                Ver más <i class="bi bi-link-45deg"></i>
                                            </a>
                                        </div>
                                    </div> <!--end::Small Box Widget 8-->
                                </div> <!--end::Row--> <!--begin::Row-->

                                <hr class="custom-hr">



                                <div class="row">
                                    @foreach($mesas as $mesa)
                                        <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 4-->
                                            <div
                                                class="small-box {{ $mesa->estado === 'Disponible' ? 'bg-success' : 'bg-danger' }}">
                                                <div class="inner">
                                                    <h3>{{ $mesa->numero }}</h3>
                                                    <p>{{ $mesa->estado }}</p>
                                                </div>
                                                <div class="icon">
                                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path
                                                            d="M2 10h20v2H2v-2zm0 5h7v5H2v-5zm9 0h11v5H11v-5zM4 6h16v2H4V6z" />
                                                    </svg>
                                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path
                                                            d="M3 6h18v12H3zM2 4v16h20V4H2zm10 5h5v1h-5v-1zm0 2h7v1h-7v-1z">
                                                        </path>
                                                    </svg>
                                                    <a href="{{ route('venta.mesaGestion', $mesa->id) }}"
                                                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover text-center w-100">
                                                        Administrar <i class="bi bi-link-45deg"></i>
                                                    </a>
                                                </div>
                                            </div> <!--end::Small Box Widget 4-->
                                        </div> <!--end::Col-->
                                    @endforeach
                                </div>


                            </div> <!--end::Col for combined box-->
                        </div> <!--end::Row for combined box-->
                    </div> <!--end::Container-->
                </div> <!--end::App Content-->
</main> <!--end::App Main-->

@include('layout.script')
<script src="{{ asset('js/adminlte.js') }}"></script>

<style>
    .separator {
        position: absolute;
        right: 0;
        top: 0;
        width: 1px;
        /* Width of the separator */
        height: 100%;
        /* Full height */
        background-color: #ffffff;
        /* Color of the separator */
        z-index: 1;
        /* Place it above the background */
    }

    .col-lg-3.col-6:last-child .separator {
        display: none;
        /* Hide the separator for the last column */
    }
</style>

@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">