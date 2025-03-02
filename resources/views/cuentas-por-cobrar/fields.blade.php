<!-- Formulario de visualización de detalles -->

<div class="row">
    <!-- Información Principal -->
    <div class="col-6">
        <!-- Detalles de Venta -->
        <div class="card mb-4 shadow">
            <div class="card-header bg-primary text-white text-center">
                <h5>Detalles de Venta</h5>
            </div>
            <div class="card-body">
                @foreach($cuenta->venta->detalleVentas as $detalle)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h5>{{ $detalle->producto->nombre }}</h5>
                                    <p class="text-muted">{{ $detalle->producto->descripcion }}</p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <span class="badge bg-secondary">Cant:
                                        {{ number_format($detalle->cantidad, 2) }}</span>
                                    <span class="badge bg-info">Precio:
                                        {{ number_format($detalle->precio_producto, 2) }}</span>
                                    <span class="badge bg-success">Total:
                                        {{ number_format($detalle->impuesto + $detalle->neto, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <div class="col-6">
        <!-- Tabla de Productos -->
        <div class="card mb-4 shadow">
            <div class="card-header bg-warning text-dark text-center">
                <h5>Productos</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="productos-table2">
                        <thead class="table-light">
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Costo</th>
                                <th>IVA</th>
                                <th>Existencia</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <!-- Resumen y Métodos de Pago -->

        <form action="{{ route('ventas.actualizar', $cuenta->venta_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-primary text-white text-center shadow">
                        <div class="card-body">
                            <h4>Total Deuda:</h4>
                            <h3><span id="">{{ number_format($cuenta->monto * $dollar, 2) }}</span> Bs</h3>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-success text-white text-center shadow">
                        <div class="card-body">
                            <h4>Monto nuevo:</h4>
                            <h3> <span id="totalVenta" class="totalVenta">0.00</span> Bs</h3>

                            <input type="hidden" name="productos" id="productosInput">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2 mb-2">
                    <div class="card bg-dark text-white text-center shadow">
                        <div class="card-body">
                            <h4>Estado:</h4>
                            <h3><span>{{   $cuenta->estado }}</span> </h3>

                        </div>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="card bg-secondary text-white text-center shadow">
                        <div class="card-body">
                            <h4>Empleado: {{ auth()->user()->name }}</h4>
                            <input type="hidden" name="tasa" id="tasa" value="{{ $dollar }}">
                        </div>
                    </div>
                </div>
            </div>

    </div>

    <div class="col-md-6">
        <div class="card-header bg-warning text-dark text-center">
            <h5>Nuevos Productos</h5>
        </div>
        <div id="productoCarrito" class="mt-3"></div>
        @if($cuenta->estado == 'Pendiente')
            <button type="submit" id="" class="btn btn-lg btn-success">Actualizar Venta</button>
            <!-- Botón Pagar -->
            <button type="button" class="btn btn-lg  btn-primary " data-toggle="modal" data-target="#pagarModal">
                Registrar Pago
            </button>
        @endif
    </div>

    <!-- Botón de Enviar -->





</div>
</form>




<!-- Modal para el Pago -->
<div class="modal fade" id="pagarModal" tabindex="-1" aria-labelledby="pagarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('cuentas-por-cobrar.update', $cuenta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="pagarModalLabel">Realizar Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Monto -->
                    <div class="form-group">
                        <label for="monto_pago"><strong>Monto a Pagar ($)</strong></label>
                        <input type="text" class="form-control" name="monto_pago" id="monto_pago"
                            value="{{$cuenta->monto }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="monto_pago"><strong>Monto a Pagar (BS)</strong></label>
                        <input type="text" class="form-control" value="{{$cuenta->monto * $dollar }}" readonly>
                    </div>
                    <!-- Tipo de Pago -->
                    <div class="form-group">
                        <label for="tipo_pago"><strong>Tipo de Pago</strong></label>
                        <select class="form-control" id="tipo_pago" name="tipo_pago" required>
                            <option value="" disabled selected>Seleccione un tipo de pago</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Pago Movil">Pago Móvil</option>
                            <option value="Punto de Venta">Punto de Venta</option>
                        </select>
                    </div>
                    <label for="Cliente">
                        <strong>Caja</strong>
                    </label>
                    <select name="caja" id="caja" class="form-control select2 mb-2 mt-2" required>
                        @foreach($cajas as $caja)
                            <option value="{{ $caja->id }}">{{ $caja->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Confirmar Pago</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('js')
    @include('layout.script')
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <script src="{{asset('js/sweetalert2.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            let productosEnCarrito = [];


            $('#productos-table2').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('ventas.datatableProductoVenta') }}",
                dataType: 'json',
                type: "POST",
                columns: [
                    {
                        data: 'imagenes', // Asumiendo que 'imagenes' es un array con las imágenes del producto
                        name: 'imagenes',
                        render: function (data) {
                            // Verificamos si hay imágenes y devolvemos la primera
                            return data.length > 0 ? `<img src="${data[0].url}" alt="Imagen" style="width: 100px; height: auto;">` : 'Sin imagen'; // Cambia 'url' por el campo correcto de tu objeto de imagen
                        }
                    },
                    { data: 'nombre', name: 'nombre' },
                    { data: 'precio_venta', name: 'precio_venta' },
                    {
                        data: 'aplica_iva', name: 'aplica_iva', render: function (data) {
                            return data ? 'Sí' : 'No';
                        }
                    },
                    { data: 'cantidad', name: 'cantidad' },

                    {
                        data: 'id',
                        name: 'actions',
                        searchable: false,
                        orderable: false,
                        render: function (data, type, full, meta) {
                            return '<button type="button" class="btn btn-success addToCartBtn" data-product-id="' + data + '">Agregar</button>';
                        }
                    }
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

            $(document).on('click', '.addToCartBtn', function () {
                const productId = $(this).data('product-id');
                const url = '{{ route('productos.obtener', ['id' => ':id']) }}';
                const urlWithId = url.replace(':id', productId);
                const $button = $(this);
                const dollar = $('#tasa').val();

                $.ajax({
                    url: urlWithId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            const producto = response.producto;

                            if (producto.cantidad == 0 || producto.cantidad < 0) {
                                Swal.fire({
                                    title: 'Sin stock',
                                    text: "Este producto no está disponible.",
                                    icon: 'info',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33'
                                })
                                return;
                            }

                            const productName = producto.nombre;
                            const productPrice = producto.precio_venta;
                            const productIva = producto.aplica_iva ? 'Sí' : 'No';
                            var precioProductoIva = producto.precio_venta;
                            if (productIva == 'Sí') {
                                var precioProductoIva = (productPrice * 1.16 * dollar).toFixed(2);
                            } else {
                                var precioProductoIva = productPrice * dollar;
                            }
                            const productDescription = producto.descripcion;
                            const productLote = producto.lote;
                            const productoStock = producto.cantidad;
                            const productSubcategoria = producto.subCategoria ? producto.subCategoria.nombre : '';

                            // Agregar el producto al array
                            productosEnCarrito.push({
                                id: productId,
                                nombre: productName,
                                precio: productPrice,
                                aplicaIva: producto.aplica_iva,
                                cantidad: 1 // Cantidad inicial
                            });
                            const productoHTML = `
                    <div class="productoCarrito p-2 border rounded bg-light mb-2 d-flex align-items-center" id="productoCarrito_${productId}">
                        <!-- Nombre del producto -->
                        <small class="nombreProducto mb-0 me-3">Nombre: ${productName}</small>

                        <!-- Precio final con IVA -->
                        <small class="mb-0 me-3"><strong>Bs ${precioProductoIva}</strong></small>

                        <!-- IVA (oculto inicialmente) -->
                        <span class="aplicaIVA text-primary d-none me-3" id="aplicaIVA_${productId}">${productIva}</span>

                        <!-- Precio bruto -->
                        <small class="text-muted me-3">
                              <strong class="text-success" id="precioProducto_${productId}">Bs ${productPrice}</strong>
                        </small>

                        <!-- Cantidad -->
                        <div class="input-group me-3">
                            <input type="number" class="form-control cantidadProducto" value="1" min="1" id="cantidadProducto_${productId}">
                            <input type="hidden" class="stock" id="stock_${productId}" value="${productoStock}"/>
                        </div>

                        <!-- Botón de eliminar -->
                        <button type="button" class="btn btn-danger btn-sm removeProducto" id="removeProducto_${productId}">Descartar</button>
                    </div>


                    `;


                            // Agregar el productoHTML al contenedor #productoCarrito
                            $('#productoCarrito').append(productoHTML);
                            $button.prop('disabled', true);

                            Swal.fire({
                                title: 'Producto Agregado',
                                text: "Se agrego un producto al carrito.",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33'
                            })
                            // Calcular el total a pagar
                            calcularTotal();
                            actualizarProductosInput();
                        } else {
                            console.error('Error: No se pudo obtener el producto.');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error al obtener el producto:', error);
                    }
                });
            });

            $(document).on('click', '.removeProducto', function () {
                const productId = $(this).attr('id').split('_')[1];
                $('#productoCarrito_' + productId).remove();
                const $button = $(this);

                // Eliminar el producto del array
                productosEnCarrito = productosEnCarrito.filter(function (producto) {
                    return producto.id != productId;
                });
                $('.addToCartBtn[data-product-id="' + productId + '"]').prop('disabled', false);
                calcularTotal();
                actualizarProductosInput();

                Swal.fire({
                    title: 'Producto Descartado',
                    text: "Se ha descatado un producto del carrito.",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33'
                })
            });

            $(document).on('change', '.cantidadProducto', function () {
                const productId = $(this).attr('id').split('_')[1]; // Obtener el ID del producto
                const nuevaCantidad = parseInt($(this).val());
                const stockDisponible = parseInt($(`#stock_${productId}`).val()); // Obtener el stock disponible
                if (nuevaCantidad > stockDisponible) {
                    Swal.fire({
                        title: 'Sin disponibilidad suficiente',
                        text: "No hay disponibilidad suficiente actualmente",
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33'
                    })
                    $(this).val(stockDisponible);
                }

                // Actualizar la cantidad en el array
                productosEnCarrito = productosEnCarrito.map(function (producto) {
                    if (producto.id == productId) {
                        producto.cantidad = nuevaCantidad;
                    }
                    return producto;
                });

                // Recalcular el total
                calcularTotal();
                actualizarProductosInput();
            });
            // Función para calcular el total de la venta
            function calcularTotal() {
                let total = 0;
                const dollar = $('#tasa').val();
                // Iterar sobre cada producto en el carrito
                $('.productoCarrito').each(function () {
                    const productId = $(this).attr('id').split('_')[1];

                    if (productId != undefined) {

                        const precioProducto = parseFloat($('#precioProducto_' + productId).text().replace('Bs', ''));

                        const cantidad = parseInt($('#cantidadProducto_' + productId).val());
                        const aplicaIva = $('#aplicaIVA_' + productId).text().trim() === 'Sí';

                        let subtotalProducto = precioProducto * cantidad * dollar;

                        // Aplicar el IVA si corresponde
                        if (aplicaIva) {
                            subtotalProducto *= 1.16; // 16% de IVA
                        }

                        total += subtotalProducto;

                    }
                });



                // Mostrar el total calculado
                $('.totalVenta').text(total.toFixed(2));

            }

            function actualizarProductosInput() {
                $('#productosInput').val(JSON.stringify(productosEnCarrito));
            }
        });


        let metodosPago = [];


        calcularTotalPagos();

        const tasaCambio = parseFloat($('#tasa').val());

        $('#agregarMetodoPago').on('click', function () {
            const metodoPago = $('#metodoPago').val();
            let cantidadPagada = parseFloat($('#cantidadPagada').val());
            const bancoOrigen = $('#bancoOrigen').val();
            const bancoDestino = $('#bancoDestino').val();
            const numeroReferencia = $('#numeroReferencia').val();

            let montoBs = cantidadPagada;
            let montoDollar = cantidadPagada / tasaCambio;
            // Validar cantidad pagada
            if (isNaN(cantidadPagada) || cantidadPagada <= 0) {
                alert('Por favor, ingresa una cantidad pagada válida.');
                return;
            }

            // Convertir divisa a bolívares si el método de pago es divisa
            if (metodoPago === 'Divisa') {
                montoBs = cantidadPagada * tasaCambio;
                montoDollar = cantidadPagada;
            }


            let totalVenta = parseFloat($('#totalVenta').text().replace('$', ''));
            let cancelado = parseFloat($('#cancelado').text().replace('$', ''));

            if (cancelado + montoBs > totalVenta) {
                $('#advertencia').show();
            } else if (cancelado + montoBs <= totalVenta) {
                $('#advertencia').hide();
                cancelado += montoBs;

                const metodo = {
                    metodo: metodoPago,
                    cantidad: cantidadPagada,
                    banco_origen: bancoOrigen,
                    banco_destino: bancoDestino,
                    numero_referencia: numeroReferencia,
                    monto_bs: montoBs,
                    monto_dollar: montoDollar
                };

                metodosPago.push(metodo);
                $('#cancelado').text('$' + cancelado.toFixed(2));

                // Check if total is paid
                if (cancelado >= totalVenta) {
                    $('#submitBtn').prop('disabled', false);
                } else {
                    $('#submitBtn').prop('disabled', true);
                }
            }

            actualizarMetodosPago();
            calcularTotalPagos();

            // Limpiar campos
            $('#cantidadPagada').val('');
            $('#bancoOrigen').val('');
            $('#bancoDestino').val('');
            $('#numeroReferencia').val('');
        });
        // Eliminar Método de Pago
        $(document).on('click', '.removeMetodoPago', function () {
            const index = $(this).data('index');
            metodosPago.splice(index, 1);
            actualizarMetodosPago();
            calcularTotalPagos();
        });

        // Actualizar lista de métodos de pago en el DOM
        function actualizarMetodosPago() {
            let html = '';
            metodosPago.forEach((metodo, index) => {
                html += `
                                <div class="mb-2 metodoPagoItem mt-3" style='space-around'>
                                    <span>${metodo.metodo} - $${metodo.monto_dollar.toFixed(2)} (${metodo.monto_bs.toFixed(2)} Bs) ${metodo.banco_origen ? ' | Origen: ' + metodo.banco_origen : ''} ${metodo.banco_destino ? ' | Destino: ' + metodo.banco_destino : ''} ${metodo.numero_referencia ? ' | Ref: ' + metodo.numero_referencia : ''}</span>
                                    <button type="button" class="btn btn-danger btn-sm removeMetodoPago" data-index="${index}">Eliminar</button>
                            `;
            });
            $('#metodosPagoList').html(html);
            $('#metodosPagoInput').val(JSON.stringify(metodosPago));
        }

        // Calcular y actualizar total a pagar y total cancelado
        function calcularTotalPagos() {
            totalPagar = 0;
            totalCancelado = 0;


            // Si el método de pago es divisa, aplicar la tasa de cambio al monto_bs
            metodosPago.forEach(metodo => {


                // Si el método de pago es divisa, aplicar la tasa de cambio al monto_bs
                if (metodo.metodo === 'Divisa') {
                    totalCancelado += metodo.cantidad * tasaCambio;
                } else {
                    totalCancelado += metodo.monto_bs;
                }
            });

            // Actualizar en el DOM
            let totalVenta = parseFloat($('#totalVenta').text().replace('$', ''));
            $('#cancelado').text('$' + totalCancelado.toFixed(2));
            $('#restante').text((totalCancelado - totalVenta).toFixed(2));


            // Habilitar o deshabilitar botón submit según el total pagado
            validarTotalPagado();
        }

        // Validar el total pagado y habilitar/deshabilitar botón submit
        function validarTotalPagado() {
            const tasa = parseFloat($('#tasa').val()) || 1; // Obtener la tasa de cambio (por defecto 1 si está vacío)
            const totalPagadoBs = totalCancelado * tasa;

            if (totalPagadoBs >= totalPagar) {
                $('#btnSubmit').prop('disabled', false).removeClass('btn-danger').addClass('btn-primary');
            } else {
                $('#btnSubmit').prop('disabled', true).removeClass('btn-primary').addClass('btn-danger');
                alert('El monto pagado no puede ser menor al total a pagar en bolívares.');
            }
        }

        // Evento cambio en la tasa de cambio
        $('#tasa').on('input', function () {
            tasaCambio = parseFloat($(this).val()) || 1; // Actualizar la tasa de cambio
            calcularTotalPagos(); // Recalcular total con la nueva tasa de cambio
        });

        // Envío del formulario
        $('#ventaForm').on('submit', function (event) {
            event.preventDefault();

            // Validar una última vez antes de enviar
            if (totalPagar <= 0 || totalCancelado < totalPagar) {
                alert('Aún no se ha pagado el total requerido.');
                return;
            }

            // Aquí puedes enviar el formulario al controlador
            // Implementa tu lógica para enviar los datos al servidor
            alert('Formulario enviado correctamente.');
            // this.submit(); // Descomenta esta línea para enviar el formulario realmente
        });
    </script>

@endsection