<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    public function facturas()
    {
        return $this->belongsToMany(Factura::class, 'lineas')
            ->as('linea')
            ->withPivot(['id', 'cantidad', 'created_at', 'updated_at']);
    }

    public function lineas()
    {
        return $this->hasMany(Linea::class);
    }
}
