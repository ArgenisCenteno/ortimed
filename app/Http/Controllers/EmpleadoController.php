<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Alert;
class EmpleadoController extends Controller
{
    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:empleados,email',
            'salario' => 'required|numeric',
            'tipo_pago' => 'required|in:semanal,mensual',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index');
    }

    public function index(Request $request)
    {  
        if ($request->ajax()) {
            $data = Empleado::with('pagos')->get(); // Use `with` to eager load roles

            return DataTables::of($data)

            
            ->addColumn('ultimo_pago', function ($row) {
                $ultimoPago = $row->pagos()->latest()->first(); // Get the latest payment
                return $ultimoPago ? $ultimoPago->created_at : "SIN PRIMER PAGO"; // Return the created_at or a message if there are no payments
            })
            
            
            ->addColumn('actions', function ($row) {
                $viewUrl = route('empleados.edit', $row->id);
                $deleteUrl = route('empleados.destroy', $row->id);
                $payUrl = route('pagos_empleados.pagar', $row->id); // Define the route for the "Pagar" button
            
                return '<a href="' . $viewUrl . '" class="btn btn-info btn-sm">Editar</a>
                        <form action="' . $deleteUrl . '" method="POST" style="display:inline;" class="btn-delete">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        <a href="' . $payUrl . '" class="btn btn-success btn-sm">Pagar</a>'; // Add the "Pagar" button
            })
            ->rawColumns(['role', 'actions'])
            ->make(true);
            
        } else {
            return view('empleados.index');
        }
    }
    public function show($id)
    {
        $empleados = Empleado::fin($id);
        return view('empleados.show', compact('empleados'));
    }
    public function edit($id)
    {
        
        $empleado = Empleado::find($id);
        return view('empleados.edit', compact('empleado'));
    }
    public function destroy($id)
    {
        $empleados = Empleado::fin($id);
        $empleados->delete();
        Alert::success('¡Éxito!', 'Empleado eliminado exitosamente')->showConfirmButton('Aceptar', 'rgba(79, 59, 228, 1)');

        return redirect()->route('empleados.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'cedula' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'salario' => 'required|numeric|min:0',
            'tipo_pago' => 'required|string|in:semanal,mensual',
            'estado' => 'required|string|in:activo,inactivo',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        Alert::success('¡Éxito!', 'Empleado actualizado exitosamente')->showConfirmButton('Aceptar', 'rgba(79, 59, 228, 1)');

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }
}

