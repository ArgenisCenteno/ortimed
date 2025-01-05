<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\PagoEmpleado;
use Illuminate\Http\Request;
use Alert;
use Yajra\DataTables\DataTables;
class PagoEmpleadoController extends Controller
{
    public function pagar($id)
    {
        $empleado = Empleado::find($id);

        return view('pagos_empleados.create', compact('empleado'));
    }

    public function store(Request $request)
    {
        $existingPayment = PagoEmpleado::where('empleado_id', $request->empleado_id)
            ->where('fecha_pago', $request->fecha_pago)
            ->first();

        if ($existingPayment) {
            Alert::success('¡Error!', 'Ya se le ha pagado el sueldo a este empleado')->showConfirmButton('Aceptar', 'rgba(79, 59, 228, 1)');

            return redirect()->back()->withErrors(['error' => 'Este sueldo ya ha sido pagado para esta fecha.']);
        }

        PagoEmpleado::create([
            'empleado_id' => $request->empleado_id,
            'monto_pagado' => $request->monto_pagado,
            'fecha_pago' => $request->fecha_pago,
            'tipo_pago' => $request->tipo_pago,
            'extra' => $request->extra,
        ]);
        Alert::success('¡Éxito!', 'Pago Registrado exitosamente')->showConfirmButton('Aceptar', 'rgba(79, 59, 228, 1)');

        return redirect()->route('pagos_empleados.index')->with('success', 'Pago registrado correctamente.');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PagoEmpleado::with('empleado')->get(); // Use `with` to eager load roles

            return DataTables::of($data)


                ->addColumn('extras', function ($row) {

                    return $row->extra ?? 0; // Return the created_at or a message if there are no payments
                })

                ->addColumn('actions', function ($row) {
                    $viewUrl = route('pagos_empleados.edit', $row->id);
                    $deleteUrl = route('pagos_empleados.destroy', $row->id);

                    return '<a href="' . $viewUrl . '" class="btn btn-info btn-sm">Editar</a>
                        <form action="' . $deleteUrl . '" method="POST" style="display:inline;" class="btn-delete">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        '; // Add the "Pagar" button
                })
                ->rawColumns(['role', 'actions'])
                ->make(true);

        } else {
            return view('pagos_empleados.index');
        }

    }

    public function edit($id)
    {
        $pago = PagoEmpleado::find($id);
        $empleado = Empleado::find($pago->empleado_id);
        return view('pagos_empleados.edit', compact('pago', 'empleado'));
    }
    public function update(Request $request, $id)
    {
        // Find the payment record by ID
        $pago = PagoEmpleado::findOrFail($id);

        // Check if a payment already exists for the same employee on the same date
        $existingPayment = PagoEmpleado::where('empleado_id', $request->empleado_id)
            ->where('fecha_pago', $request->fecha_pago)
            ->where('id', '!=', $id) // Ensure it's not the same payment being edited
            ->first();

        if ($existingPayment) {
            return redirect()->back()->withErrors(['error' => 'Este sueldo ya ha sido pagado para esta fecha.']);
        }

        // Update the payment record
        $pago->update([
            'empleado_id' => $request->empleado_id,
            'monto_pagado' => $request->monto_pagado,
            'fecha_pago' => $request->fecha_pago,
            'tipo_pago' => $request->tipo_pago,
            'extra' => $request->extra,
        ]);
        Alert::success('¡Éxito!', 'Pago Actualizado exitosamente')->showConfirmButton('Aceptar', 'rgba(79, 59, 228, 1)');

        return redirect()->route('pago_empleados.index')->with('success', 'Pago actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Find the payment record by ID
        $pago = PagoEmpleado::findOrFail($id);

        // Delete the payment record
        $pago->delete();

        // Redirect with a success message
        Alert::success('¡Éxito!', 'Pago eliminado exitosamente')->showConfirmButton('Aceptar', 'rgba(79, 59, 228, 1)');

        return redirect()->route('pago_empleados.index')->with('success', 'Pago eliminado correctamente.');
    }

}
