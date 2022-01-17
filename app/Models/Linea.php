<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Linea extends Pivot
{
    public $table = 'lineas';

    public $incrementing = true;
}
