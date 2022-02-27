<?php

namespace App\Models;
use App\Models\Ciudad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    public function ciudades()
    {
        return $this->belongsTo(Ciudad::class, 'idCiudad');
    }
}
