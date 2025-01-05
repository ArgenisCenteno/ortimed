<form action="{{ route('ventas.generarVenta') }}" method="POST">
    @csrf <!-- Agrega el token CSRF para seguridad -->
    <section>



        <div class="text-center mt-4 card pt-2 pb-2 bg-success text-white"
            style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
            <h3>Total a Pagar: <span id="totalVenta" class="totalVenta">0.00</span> Bs</h3>


            <input type="hidden" name="productos" id="productosInput">

        </div>

        <div class=" mb-4">
            <div class="card  p-4 bg-dark text-white">
                <h4 class=" mb-3">Empleado: {{ auth()->user()->name }}</h4>

                <!-- Información de tasa de cambio oculta -->
                <input type="hidden" name="tasa" id="tasa" value="{{ $dollar}}">
             

                <!-- Selección de Caja y Cliente -->
                <div class="mb-3">
                    <label for="caja" class="form-label"> <strong>Caja</strong> </label>
                    <select name="caja" id="caja" class="form-select select2">
                        @foreach($cajas as $caja)
                            <option value="{{ $caja->id }}">{{ $caja->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label"> <strong>Cliente</strong> </label>
                    <select name="user_id" id="user_id" class="form-select select2">
                        @foreach($users as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Método de Pago y Selección de Mesa -->
                <div class="row g-3" id="metodosPagoContainer">
                    <div class="col-12 mb-3">
                        <label for="metodoPago" class="form-label">
                            <strong>Forma de Pago</strong>
                        </label>
                        <select class="form-select" id="metodoPago" name="metodoPago">
                            <option value="Efectivo">Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Pago Movil">Pago Móvil</option>
                            <option value="Divisa">Divisa</option>
                            <option value="Punto de Venta">Punto de Venta</option>
                            <option value="Pagar luego">Pagar luego</option>
                            <option value="A Credito">Credito</option>

                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="Mesa" class="form-label">
                            <strong>Mesa</strong>
                        </label>
                        <select id="mesa_id" name="mesa_id" class="form-control">
                            <option value="">Seleccione una mesa (opcional)</option>
                            @foreach($mesas as $mesa)
                                <option value="{{ $mesa->id }}">{{ $mesa->numero }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="Mesa" class="form-label">
                            <strong>Servicio</strong>
                        </label>
                        <select id="tipo_servicio" name="tipo_servicio" class="form-control" required>
                            <option value="comer_aqui">Comer aquí</option>
                            <option value="delivery">Delivery</option>
                            <option value="para_llevar">Para llevar</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div id="metodosPagoList"></div>

        <div class="productoCarrito" id="productoCarrito">

        </div>
        <button type="submit" id="submitBtn" class="btn btn-success w-100">Generar venta</button>
        </div>

    </section>

</form>