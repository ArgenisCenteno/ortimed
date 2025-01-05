<section >
    <div >
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="row">

                            <div class="col-lg-7">
                                <h5 class="mb-3"><a href="{{route('ventas.index')}}" class="text-body"><i
                                            class="fas fa-long-arrow-alt-left me-2"></i>Regresar</a></h5>
                                <hr>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Productos Vendidos</p>
                                    </div>
                                    <div>
                                        <p class="mb-0">Se vendieron {{count($venta->detalleVentas)}} productos</p>
                                      
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="ms-3">
                                                    <span>PRODUCTO</span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                                <div style="width: 80px;">
                                                    <span class="fw-normal mb-0">CANT.</span>
                                                </div>
                                                <div style="width: 80px;">
                                                    <span class="mb-0">PRECIO</span>
                                                </div>
                                                <div style="width: 80px;">
                                                    <span class="mb-0">NETO</span>
                                                </div>
                                                <div style="width: 80px;">
                                                    <span class="mb-0">IVA</span>
                                                </div>
                                                <div style="width: 80px;">
                                                    <span class="mb-0">TOTAL</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @foreach($venta->detalleVentas as $detalle)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">

                                                    <div class="ms-3">
                                                        <h5>{{ $detalle->producto->nombre }}</h5>
                                                        <p class="small mb-0">{{ $detalle->producto->descripcion }}</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <div style="width: 80px;">
                                                        <h5 class="fw-normal mb-0">
                                                            {{ number_format($detalle->cantidad, 2) }}
                                                        </h5>
                                                    </div>
                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">{{ number_format($detalle->precio_producto, 2) }}
                                                        </h5>
                                                    </div>
                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">{{ number_format($detalle->neto, 2) }}</h5>
                                                    </div>
                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">{{ number_format($detalle->impuesto, 2) }}</h5>
                                                    </div>
                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">
                                                            {{ number_format($detalle->impuesto + $detalle->neto, 2) }}
                                                        </h5>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @endforeach


                            </div>
                            <div class="col-lg-5">
                                <div class="card bg-primary text-white rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Detalles de Venta</h5>

                                        </div>



                                        <form class="mt-4">
                                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                                <input type="text" id="typeText" class="form-control form-control-lg"
                                                    size="17" placeholder="{{ $venta->vendedor->name }}" readonly />
                                                <label class="form-label" for="typeText">Vendedor</label>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-12">
                                                    <div data-mdb-input-init class="form-outline form-white">
                                                        <input type="text" id="typeExp"
                                                            class="form-control form-control-lg"
                                                            value="{{ $venta->user->name }}" readonly
                                                            placeholder="Comprador" size="7" />
                                                        <label class="form-label" for="typeExp">Cliente</label>
                                                    </div>
                                                </div>
                                                 
                                            </div>

                                            <div class="row mb-4">
                                                 
                                                <div class="col-md-12">
                                                    <div data-mdb-input-init class="form-outline form-white">
                                                        <input type="text" id="typeText"
                                                            class="form-control form-control-lg"
                                                            value="{{ $venta->pago->status }}" readonly
                                                            placeholder="Estado del Pago" size="1" />
                                                        <label class="form-label" for="typeText">Estado del Pago</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                                <input type="text" id="typeText" class="form-control form-control-lg"
                                                    size="17" value="{{ $venta->created_at->format('Y-m-d') }}" readonly
                                                    placeholder="Fecha de Compra" />
                                                <label class="form-label" for="typeText">Fecha de Compra</label>
                                            </div>
                                        </form>


                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Subtotal</p>
                                            <p class="mb-2">${{ number_format($venta->pago->monto_neto, 2) }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">IVA (16%)</p>
                                            <p class="mb-2">${{ number_format($venta->pago->impuestos, 2) }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Total(Incl. IVA)</p>
                                            <p class="mb-2">${{ number_format($venta->pago->monto_total, 2) }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Total(BS)</p>
                                            <p class="mb-2">${{ number_format($venta->pago->tasa_dolar * $venta->pago->monto_total, 2) }}</p>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>