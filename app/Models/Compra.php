<?php

namespace App\Models;
use App\Models\Elemento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idCompra';

    public function elementos()
    {
        return $this->belongsTo(Elemento::class, 'idElemento');
    }
}
