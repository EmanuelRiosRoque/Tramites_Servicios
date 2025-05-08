<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    use HasFactory;

    protected $fillable = [
        'tramite_servicio_id', 
        'requisito',
    ];

    public function tramite()
    {
        return $this->belongsTo(TramiteServicio::class, 'fk_tramite_servicio');
    }
    
}
