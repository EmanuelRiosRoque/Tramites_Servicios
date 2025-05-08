<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MontoTramite extends Model
{
    use HasFactory;

    protected $fillable = [
        'tramite_servicio_id',
        'monto',
    ];

    protected $table = 'montos_tramite'; //   ¡Aquí fuerzas el nombre correcto!

    public function tramite()
    {
        return $this->belongsTo(TramiteServicio::class, 'tramite_servicio_id');
    }
    
}
