<?php

namespace App\Models;
use App\Models\Provincia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idCiudad';

    public function provincias()
    {
        return $this->belongsTo(Provincia::class, 'idProvincia');
    }
}
