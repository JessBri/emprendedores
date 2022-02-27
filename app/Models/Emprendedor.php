<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprendedor extends Model
{
    protected $primaryKey = 'idEmprendedor';
    protected $fillable = ['identificacionEmprendedor',
     'nombreEmprendedor',
     'apellidoEmprendedor',
     'razonSocialEmprendedor',
     'contrasenaEmprendedor',
     'paginaWebEmprendedor',
    ];
    use HasFactory;
}
