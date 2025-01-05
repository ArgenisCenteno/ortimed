<div class="table-responsive">
    <table class="table table-hover" id="productos-table">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Cedula</th>
                <th>Sueldo</th>
                <th>Extra</th>
                <th>Monto Pagado</th>
            
                 <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
        </tbody>
    </table>
</div>


@section('js')
@include('layout.script')
<script src="{{ asset('js/adminlte.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#productos-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('pagos_empleados.index') }}",
            dataType: 'json',
            type: "POST",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'empleado.nombre', name: 'empleado.nombre' },
                { data: 'empleado.cedula', name: 'empleado.cedula' },
                { data: 'monto_pagado', name: 'monto_pagado' },
                { data: 'extras', name: 'extras' },
                { data: 'monto_pagado', name: 'monto_pagado' },
               
                { data: 'actions', name: 'actions', searchable: false, orderable: false } // Make sure to set orderable and searchable to false
            ],
            order: [[0, 'desc']],
            "language": {
                "lengthMenu": "Mostrar _MENU_ Registros por Página",
                "zeroRecords": "Sin resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay Registros Disponibles",
                "infoFiltered": "Filtrado de _TOTAL_ de _MAX_ Registros Totales",
                "search": "Buscar",
                "paginate": {
                    "next": ">",
                    "previous": "<"
                }
            }
        });

    });
</script>


@endsection