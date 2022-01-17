<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Linea extends Pivot
{
    public $table = 'lineas';

    public $incrementing = true;

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }
}
