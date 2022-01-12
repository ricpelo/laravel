<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depart extends Model
{
    use HasFactory;

    protected $table = 'depart';

    protected $fillable = ['denominacion', 'localidad'];

    public function empleados()
    {
        return $this->hasMany(Emple::class);
    }
}
