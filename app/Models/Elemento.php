<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categoria;

class Elemento extends Model
{
    protected $primaryKey = 'idElemento';
    protected $fillable = [
        'nombreElemento',
        'descripcionElemento',
        'precioElemento',
        'estadoElemento',
        'idCategoria',
        'idEmprendedor',
        'tipoElemento',
        'fechaInicioElemento',
        'fechaFinElemento'
       ];
    use HasFactory;

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }
}
