<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paso extends Model
{
    use HasFactory;

    protected $fillable = [
        'tramite_servicio_id',
        'paso',
    ];

    public function tramiteServicio()
    {
        return $this->belongsTo(TramiteServicio::class);
    }
}
