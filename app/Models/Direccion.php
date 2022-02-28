<?php

namespace App\Models;
use App\Models\Ciudad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idDireccion';

    public function ciudades()
    {
        return $this->belongsTo(Ciudad::class, 'idCiudad');
    }
}
