<?php
namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    public function index()
    {
        $mesas = Mesa::all(); // Obtener todas las mesas
        return view('mesas.index', compact('mesas'));
    }

    public function create()
    {
        return view('mesas.create'); // Mostrar formulario para crear una nueva mesa
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:mesas|max:50',
            'capacidad' => 'required|integer|min:1',
            'estado' => 'required|in:Disponible,Ocupada',
        ]);

        Mesa::create($request->all());
        return redirect()->route('mesas.index')->with('success', 'Mesa creada exitosamente.');
    }

    public function show(Mesa $mesa)
    {
        return view('mesas.show', compact('mesa')); // Mostrar detalles de una mesa
    }

    public function edit(Mesa $mesa)
    {
        return view('mesas.edit', compact('mesa')); // Mostrar formulario de edición
    }

    public function update(Request $request, Mesa $mesa)
    {
        $request->validate([
            'numero' => 'required|max:50|unique:mesas,numero,' . $mesa->id,
            'capacidad' => 'required|integer|min:1',
            'estado' => 'required|in:Disponible,Ocupada',
        ]);

        $mesa->update($request->all());
        return redirect()->route('mesas.index')->with('success', 'Mesa actualizada exitosamente.');
    }

    public function destroy(Mesa $mesa)
    {
        $mesa->delete();
        return redirect()->route('mesas.index')->with('success', 'Mesa eliminada exitosamente.');
    }
}
