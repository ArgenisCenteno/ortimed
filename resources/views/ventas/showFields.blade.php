<div class="form-section">
    <form>
        <div class="row">
            <!-- Cliente -->
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="cliente">Cliente</label>
                    <input type="text" class="form-control" id="cliente" value="{{ $venta->user->name }}" readonly>
                </div>
            </div>

            <!-- Monto Total -->
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="monto_total">Monto Total</label>
                    <input type="text" class="form-control" id="monto_total"
                        value="{{ number_format($venta->monto_total, 2) }}" readonly>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="status_pago">Estado del Pago</label>
                    <input value="{{ $venta->status }}" readonly class="form-control" />
                </div>
            </div>
           
        </div>

        <div class="row">
            <!-- Estado del Pago -->
           

            <!-- Fecha de Venta -->
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="fecha_venta">Fecha de Venta</label>
                    <input type="text" class="form-control" id="fecha_venta"
                        value="{{ $venta->created_at->format('Y-m-d') }}" readonly>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Detalles de Venta -->
<div class="table-responsive">
    <h4>Lista de Productos</h4>
    <table class="table table-bordered table-striped table-hover w-100">
        <thead class="table-dark text-center">
            <tr>
                 
               
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Impuesto</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->detalleVentas as $detalle)
                <tr class="text-center">
                  
                 
                    <td>
                        @if($detalle->producto->imagenes->isNotEmpty())
                            <img src="{{ asset( $detalle->producto->imagenes->first()->url) }}" 
                                alt="{{ $detalle->producto->nombre }}" 
                                class="img-thumbnail" style="width: 100px; height: 100px;">
                        @else
                            <span>Sin Imagen</span>
                        @endif
                    </td>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>{{ number_format($detalle->precio_producto, 2) }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ number_format($detalle->neto, 2) }}</td>
                    <td>{{ number_format($detalle->impuesto, 2) }}</td>
                    <td>{{ number_format($detalle->impuesto + $detalle->neto, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
