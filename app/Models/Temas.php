<?php

namespace App\Models;

use App\Casts\Interval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temas extends Model
{
    use HasFactory;

    private $_duracion = null;

    protected $casts = [
        'duracion' => Interval::class,
    ];
}
