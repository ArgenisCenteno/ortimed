<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoEmpleado extends Model
{
    protected $table = "pagos_empleados";
    protected $fillable = ['empleado_id', 'extra', 'monto_pagado', 'fecha_pago', 'tipo_pago'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}

