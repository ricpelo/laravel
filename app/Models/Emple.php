<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emple extends Model
{
    use HasFactory;

    protected $table = 'emple';

    public function departamento()
    {
        return $this->belongsTo(Depart::class, 'depart_id');
    }
}
