<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundamentoPlazo extends Model
{
    use HasFactory;
    protected $table = 'fundamentos_plazo'; //   Forzar tabla correcta

    protected $fillable = [
        'tramite_servicio_id',
        'fundamento',
    ];

    public function tramite()
    {
        return $this->belongsTo(TramiteServicio::class, 'tramite_servicio_id');
    }
}
