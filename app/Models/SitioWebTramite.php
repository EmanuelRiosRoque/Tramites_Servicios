<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitioWebTramite extends Model
{
    use HasFactory;

    protected $table = 'sitios_web_tramite'; 

    protected $fillable = [
        'tramite_servicio_id',
        'sitio',
    ];

    public function tramite()
    {
        return $this->belongsTo(TramiteServicio::class, 'tramite_servicio_id');
    }
}
