<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'empleados';
    protected $fillable = [
        'codigo',
        'nombre',
        'sueldo_dolar',
        'sueldo_pesos',
        'correo',
        'direccion',
        'estado',
        'ciudad',
        'telefono',
        'activo'
    ];
    public $porcentajeDolar;
    public $porcentajePesos;
}
