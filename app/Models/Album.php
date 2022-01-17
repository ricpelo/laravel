<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albumes';

    public function canciones()
    {
        return $this->belongsToMany(Cancion::class)
            ->withPivot(['duracion']);
    }
}
