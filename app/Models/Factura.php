<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // public function lineas()
    // {
    //     return $this->hasMany(Linea::class);
    // }

    public function articulos()
    {
        return $this->belongsToMany(Articulo::class, 'lineas')
            ->withPivot(['id', 'cantidad', 'created_at', 'updated_at']);
    }
}
