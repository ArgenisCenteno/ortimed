<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vendedor_id',
        'monto_total',
        'status',
        'porcentaje_descuento',
        'pago_id',
        'mesa',
        'mesa_id',
        'tipo_servicio',
    ];

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'pago_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }
    public function cuentaPorCobrar()
    {
        return $this->belongsTo(CuentaPorCobrar::class, 'venta_id');
    }

    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class, 'id_venta');
    }

    public function detalles()
{
    return $this->hasMany(DetalleVenta::class, 'id_venta');
}

}
