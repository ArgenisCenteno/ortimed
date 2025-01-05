
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Nombre -->
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empleado->nombre }}" required>
            </div>

            <!-- Dirección -->
            <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $empleado->direccion }}" required>
            </div>
        </div>

        <div class="row">
            <!-- Cédula -->
            <div class="col-md-6 mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" value="{{ $empleado->cedula }}" required>
            </div>

            <!-- Cargo -->
            <div class="col-md-6 mb-3">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="cargo" name="cargo" value="{{ $empleado->cargo }}" required>
            </div>
        </div>

        <div class="row">
            <!-- Teléfono -->
            <div class="col-md-6 mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $empleado->telefono }}" required>
            </div>

            <!-- Email -->
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $empleado->email }}" required>
            </div>
        </div>

        <div class="row">
            <!-- Salario -->
            <div class="col-md-6 mb-3">
                <label for="salario" class="form-label">Salario</label>
                <input type="number" step="0.01" class="form-control" id="salario" name="salario" value="{{ $empleado->salario }}" required>
            </div>

            <!-- Tipo de pago -->
            <div class="col-md-6 mb-3">
                <label for="tipo_pago" class="form-label">Tipo de Pago</label>
                <select class="form-control" id="tipo_pago" name="tipo_pago" required>
                    <option value="semanal" {{ $empleado->tipo_pago == 'semanal' ? 'selected' : '' }}>Semanal</option>
                    <option value="mensual" {{ $empleado->tipo_pago == 'mensual' ? 'selected' : '' }}>Mensual</option>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Estado -->
            <div class="col-md-6 mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="activo" {{ $empleado->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $empleado->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
            </div>
        </div>
    </form>

