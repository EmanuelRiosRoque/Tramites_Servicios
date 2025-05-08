<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonoTramite extends Model
{
    use HasFactory;

    protected $table = 'telefono_tramites'; 

    protected $fillable = [
        'tramite_servicio_id',
        'numero',
        'area',
    ];

    public function tramite()
    {
        return $this->belongsTo(TramiteServicio::class, 'tramite_servicio_id');
    }
}
