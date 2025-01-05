<form action="{{ route('empleados.store') }}" method="POST">
    @csrf
   
        <div class="row">
            <!-- Nombre -->
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <!-- Dirección -->
            <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
        </div>

        <div class="row">
            <!-- Cédula -->
            <div class="col-md-6 mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" required>
            </div>

            <!-- Cargo -->
            <div class="col-md-6 mb-3">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="cargo" name="cargo" required>
            </div>
        </div>

        <div class="row">
            <!-- Teléfono -->
            <div class="col-md-6 mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>

            <!-- Email -->
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>

        <div class="row">
            <!-- Salario -->
            <div class="col-md-6 mb-3">
                <label for="salario" class="form-label">Salario</label>
                <input type="number" step="0.01" class="form-control" id="salario" name="salario" required>
            </div>

            <!-- Tipo de pago -->
            <div class="col-md-6 mb-3">
                <label for="tipo_pago" class="form-label">Tipo de Pago</label>
                <select class="form-control" id="tipo_pago" name="tipo_pago" required>
                    <option value="semanal">Semanal</option>
                    <option value="mensual">Mensual</option>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Estado -->
            <div class="col-md-6 mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>

            <!-- Fecha de contratación -->
            
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Crear Empleado</button>
            </div>
        </div>
     
</form>
