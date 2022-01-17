<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class)
            ->withPivot('created_at');
    }
}
