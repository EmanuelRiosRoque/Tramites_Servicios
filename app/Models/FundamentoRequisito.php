<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundamentoRequisito extends Model
{
    use HasFactory;

    protected $fillable = [
        'tramite_servicio_id',
        'fundamento',
    ];

    public function tramite()
    {
        return $this->belongsTo(TramiteServicio::class, 'tramite_servicio_id');
    }
}
