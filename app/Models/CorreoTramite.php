<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorreoTramite extends Model
{
    use HasFactory;

    protected $table = 'correos_tramite';

    protected $fillable = [
        'tramite_servicio_id',
        'correo',
        'area',
    ];

    public function tramite()
    {
        return $this->belongsTo(TramiteServicio::class, 'tramite_servicio_id');
    }
}
