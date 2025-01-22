<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\DetalleVenta;
use App\Models\Pago;
use App\Models\Venta;
use Illuminate\Http\Request;
use Alert;
use Carbon;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfController extends Controller
{
    public function pdfVenta(Request $request, $id)
    {
        $venta = Venta::with('detalleVentas', 'vendedor', 'user', 'pago')->where('id', $id)->first();

        if (!$venta) {
            Alert::error('¡Error!', 'Venta no encontrada.')->showConfirmButton('Aceptar', 'rgba(79, 59, 228, 1)');
            return redirect(route('ventas.index'));
        }
        if (!isset($venta->pago)) {
            Alert::error('¡Error!', 'Venta no pagada.')->showConfirmButton('Aceptar', 'rgba(79, 59, 228, 1)');
            return redirect(route('ventas.index'));
        }
        // Ocultar 'password' y 'remember_token' y convertir a array
        $vendedorArray = $venta->vendedor->makeHidden(['password', 'remember_token'])->toArray();
        $userArray = $venta->user->makeHidden(['password', 'remember_token'])->toArray();
        $fechaVenta = $venta->created_at->format('d-m-Y');
        $formaPagoArray = json_decode($venta->pago->forma_pago, true); 
        $ventaId = $venta->id;
         $qrCode = QrCode::size(120)->generate('http://127.0.0.1:8000/pdfVenta/' . $id);

       // dd($vendedorArray);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('ventas.pdf', compact('qrCode','venta', 'formaPagoArray', 'vendedorArray', 'userArray', 'fechaVenta'));
        return $pdf->stream('venta.pdf');
    }

    public function pdfCompra(Request $request, $id)
    {
        $compra = Compra::with('detalleCompras', 'user', 'proveedor', 'pago')->where('id', $id)->first();

        if (!$compra) {
            Alert::error('¡Error!', 'Compra no encontrada.')->showConfirmButton('Aceptar', 'rgba(79, 59, 228, 1)');
            return redirect(route('compras.index'));
        }

        if (!isset($compra->pago)) {
            Alert::error('¡Error!', 'Compra no pagada.')->showConfirmButton('Aceptar', 'rgba(79, 59, 228, 1)');
            return redirect(route('compras.index'));
        }
        // Ocultar 'password' y 'remember_token' y convertir a array
        $userArray = $compra->user->makeHidden(['password', 'remember_token'])->toArray();
      
        $fechacompra = $compra->created_at->format('d-m-Y');
        $formaPagoArray = json_decode($compra->pago->forma_pago, true); 

        $compraId = $compra->id;
        $qrCode = QrCode::size(120)->generate('http://127.0.0.1:8000/pdfCompra/' . $id);

       // dd($vendedorArray);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('compras.pdf', compact('qrCode','compra', 'formaPagoArray', 'userArray',  'fechacompra'));
        return $pdf->stream('venta.pdf');
    }

    public function pdfPago(Request $request, $id)
    {
        $pago = Pago::with('ventas', 'user', 'compras')->where('id', $id)->first();

        

        if (!$pago) {
            Alert::error('¡Error!', 'Venta no encontrada.')->showConfirmButton('Aceptar', 'rgba(79, 59, 228, 1)');
            return redirect(route('ventas.index'));
        }

        if($pago->tipo == 'Venta Regular'){
            $detalles = $pago->compras;
        }else{
            $detalles = $pago->detalles;
        }

        // Ocultar 'password' y 'remember_token' y convertir a array
        $userArray = $pago->user->makeHidden(['password', 'remember_token'])->toArray();
      
        $fechapago = $pago->created_at->format('d-m-Y');
        $formaPagoArray = json_decode($pago->forma_pago, true); 
        $qrCode = QrCode::size(120)->generate('http://127.0.0.1:8000/pdfPago/' . $id);

       // dd($vendedorArray);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('pagos.pdf', compact('qrCode','pago', 'formaPagoArray', 'userArray', 'detalles' , 'fechapago'));
        return $pdf->stream('venta.pdf');
    }

    public function pdfEstadoCuenta($id){
        //
    }

}
