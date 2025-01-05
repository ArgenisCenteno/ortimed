<form action="{{ route('pagos_empleados.update', $pago->id) }}" method="POST">
    @csrf
    @method('PATCH') <!-- Use PATCH for updating the payment -->

    <!-- Row for the employee's details -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $empleado->nombre }}" readonly>
        </div>

        <div class="col-md-4 mb-3">
            <label for="cedula" class="form-label">Cédula</label>
            <input type="text" id="cedula" name="cedula" class="form-control" value="{{ $empleado->cedula }}" readonly>
        </div>

        <div class="col-md-4 mb-3">
            <label for="salario" class="form-label">Salario</label>
            <input type="text" id="salario" name="salario" class="form-control" value="{{ $empleado->salario }}" readonly>
        </div>
    </div>

    <!-- Row for the payment details -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="extra" class="form-label">Monto Extra</label>
            <input type="number" id="extra" name="extra" class="form-control" value="{{ $pago->extra ?? 0 }}" step="any">
        </div>

        <div class="col-md-4 mb-3">
            <label for="monto_pagado" class="form-label">Monto Pagado</label>
            <input type="number" id="monto_pagado" name="monto_pagado" class="form-control" value="{{ $pago->monto_pagado }}" readonly>
        </div>

        <div class="col-md-4 mb-3">
            <label for="fecha_pago" class="form-label">Fecha de Pago</label>
            <input type="date" id="fecha_pago" name="fecha_pago" class="form-control" value="{{ $pago->fecha_pago }}" required>
        </div>
    </div>

    <!-- Row for the payment type -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="tipo_pago" class="form-label">Tipo de Pago</label>
            <select id="tipo_pago" name="tipo_pago" class="form-control" required>
                <option value="semanal" {{ $pago->tipo_pago == 'semanal' ? 'selected' : '' }}>Semanal</option>
                <option value="mensual" {{ $pago->tipo_pago == 'mensual' ? 'selected' : '' }}>Mensual</option>
            </select>
        </div>

        <!-- Hidden field to pass the employee's ID -->
        <div class="col-md-4 mb-3 d-none">
            <input type="hidden" name="empleado_id" value="{{ $empleado->id }}">
        </div>

        <!-- Submit button -->
        <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary">Actualizar Pago</button>
        </div>
    </div>
</form>

<!-- JavaScript to automatically calculate "Monto Pagado" -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const salario = parseFloat(document.getElementById('salario').value);
        const extraInput = document.getElementById('extra');
        const montoPagadoInput = document.getElementById('monto_pagado');

        // Update monto_pagado whenever extra value changes
        extraInput.addEventListener('input', function () {
            const extra = parseFloat(extraInput.value) || 0; // If extra is empty, use 0
            const montoPagado = salario + extra; // Calculate monto_pagado
            montoPagadoInput.value = montoPagado.toFixed(2); // Set the value with 2 decimal places
        });

        // Initialize the monto_pagado when the page loads
        const initialExtra = parseFloat(extraInput.value) || 0;
        montoPagadoInput.value = (salario + initialExtra).toFixed(2); // Set the initial value
    });
</script>
