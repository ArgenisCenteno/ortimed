<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Compra;
use App\Models\Mesa;
use App\Models\Pago;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\SubCategoria;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ventas = Venta::sum('monto_total');
        $compras = Compra::sum('monto_total');
        $usuarios = User::count();
        $productos = Producto::count();
        $categorias = Categoria::count();
        $subcategorias = SubCategoria::count();
        $proveedores = Proveedor::count();
        $pagos = Pago::count();
        $mesas = Mesa::all();
        $deudas = Compra::where('status', 'Pendiente')->sum('monto_total');
        $pendientes = Venta::where('status', 'Pendiente')->sum('monto_total');
        $notificaciones = auth()->user()->unreadNotifications;

        
        return view('home', compact('pendientes','deudas','ventas', 'compras', 'mesas',  'notificaciones' ,'proveedores' ,'usuarios', 'productos', 'categorias', 'subcategorias', 'pagos'));
    }
    
  
}
