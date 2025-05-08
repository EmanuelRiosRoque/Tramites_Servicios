<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioTramite extends Model
{
    use HasFactory;
    
    protected $table = 'horarios_tramite'; //   Forzar tabla correcta


    protected $fillable = [
        'tramite_servicio_id',
        'horario_atencion',
        'area',
    ];

    public function tramite()
    {
        return $this->belongsTo(TramiteServicio::class, 'tramite_servicio_id');
    }
}
