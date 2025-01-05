<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = ['nombre', 'estado', 'cedula', 'cargo', 'direccion', 'telefono', 'email', 'salario', 'tipo_pago'];

    public function pagos()
    {
        return $this->hasMany(PagoEmpleado::class);
    }
}

