<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoFormatoRequerido extends Model
{
    use HasFactory;

    protected $table = 'documentos_formatos_requeridos'; 

    protected $fillable = [
        'tramite_servicio_id',
        'nombre_archivo',
        'tipo_archivo',
        'tamano_archivo',
        'tipo', // documento o formato
        'ruta_archivo',
    ];

    public function tramite()
    {
        return $this->belongsTo(TramiteServicio::class, 'tramite_servicio_id');
    }
}
