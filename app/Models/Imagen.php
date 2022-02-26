<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $primaryKey = 'idImagen';
    protected $fillable = ['nombreImagen', 'urlImagen', 'ordenImagen', 'idElemento'];
    use HasFactory;
}
