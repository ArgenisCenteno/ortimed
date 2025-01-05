<form action="{{ route('pagos_empleados.store') }}" method="POST">
    @csrf

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
            <input type="number" id="extra" name="extra" class="form-control" value="0" step="any">
        </div>

        <div class="col-md-4 mb-3">
            <label for="monto_pagado" class="form-label">Monto Pagado</label>
            <input type="number" id="monto_pagado" name="monto_pagado" class="form-control" readonly>
        </div>

        <div class="col-md-4 mb-3">
            <label for="fecha_pago" class="form-label">Fecha de Pago</label>
            <input type="date" id="fecha_pago" name="fecha_pago" class="form-control" required>
        </div>
    </div>

    <!-- Row for the payment type -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="tipo_pago" class="form-label">Tipo de Pago</label>
            <select id="tipo_pago" name="tipo_pago" class="form-control" required>
                <option value="semanal">Semanal</option>
                <option value="mensual">Mensual</option>
            </select>
        </div>

        <!-- Hidden field to pass the employee's ID -->
        <div class="col-md-4 mb-3 d-none">
            <input type="hidden" name="empleado_id" value="{{ $empleado->id }}">
        </div>

        <!-- Submit button -->
        
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Registrar Pago</button>
            </div>
        </div>
        
    </div>
</form>

<!-- Add JavaScript to automatically calculate "Monto Pagado" -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the salario and extra inputs
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
