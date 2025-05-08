<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoEstatus extends Model
{
    use HasFactory;

    protected $table = 'catalogo_estatus'; // <-   Nombre correcto

    protected $fillable = [
        'nombre',
    ];
}
