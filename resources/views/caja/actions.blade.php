<td>
    {!! Form::open(['route' => ['cajas.destroy', $id], 'method' => 'delete', 'class' => 'btn-delete']) !!}
    <div class='btn-group'>
        <a href="{{ route('cajas.edit', [$id]) }}" class='btn btn-info' data-bs-toggle="tooltip"
            data-bs-placement="top" title="Editar">Editar</a>
            <a href="{{ route('cajas.aperturar', [$id]) }}" class='btn btn-success' data-bs-toggle="tooltip"
            data-bs-placement="top" title="Editar">Administrar</a>    
        
        {!! Form::button('Eliminar', ['type' => 'submit', 'class' =>
        'btn btn-danger', 'data-bs-toggle' => 'tooltip', 'data-bs-placement' => 'top', 'title' => 'Eliminar']) !!}
    </div>
    {!! Form::close() !!}
</td>

<!-- SweetAlert CDN -->
<script src="{{asset('js/sweetalert2.js')}}"></script>

<script>
    $(document).ready(function() {
        $('.btn-delete').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Está seguro?',
                text: "El registro se eliminará permanentemente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgba(13, 172, 85)',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aquí se envía el formulario si se confirma la eliminación
                    $(this).off('submit').submit();
                }
            });
        });
    });
</script>