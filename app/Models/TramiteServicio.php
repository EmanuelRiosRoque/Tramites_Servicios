<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TramiteServicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_estatus',
        'origen',
        'fundamento_tramite',
        'nombre_tramite',
        'descripcion',
        'tipo',
        'formato_requerido',
        'modalidad',
        'fk_areasObligada',
        'fundamento_existencia',
        
        //formato
        'tipo_formato',
        'otro_formato',
        'fundamento_formato',
        'ultima_fecha_publicacion',
        //Inspeccin
        'requiere_inspeccion',
        'objetivo_inspeccion',
        'fundamento_inspeccion',
        //Plazo
        'plazo',
        'plazo_sujeto',
        'plazo_solicitante',

        //Monto
        'fundamento_monto',

        //Vigencia
        'vigencia',
        'fundamento_vigencia',

        //Criterios
        'criterio',
        'fundamento_criterio',

        //Otros medios
        'demas_datos_relativos',

        //Formacion
        'informacion',
        'fundamento_informacion',

        // Demas informacion
        'tramite_en_linea',
        'cargar_documentos',
        'seguimiento',
        'informacion_medios',
        'respuesta_resolucion',
        'utiliza_firma',
        'realizar_notificaciones',
        'demas_informacion',

        'motivo_rechazo'
    ];

    // 🚀 Aquí el cast
    protected $casts = [
        'tipo' => 'array',
    ];



    public function pasos()
    {
        return $this->hasMany(Paso::class, 'tramite_servicio_id');
    }

    public function requisitos()
    {
        return $this->hasMany(Requisito::class, 'tramite_servicio_id');
    }

    public function fundamentoRequisitos()
    {
        return $this->hasMany(FundamentoRequisito::class, 'tramite_servicio_id');
    }

    public function documentosFormatos()
    {
        return $this->hasMany(DocumentoFormatoRequerido::class, 'tramite_servicio_id');
    }

    public function montos()
    {
        return $this->hasMany(MontoTramite::class, 'tramite_servicio_id');
    }
    
    public function inmueblesTramite()
    {
        return $this->hasMany(InmuebleTramite::class, 'tramite_servicio_id');
    }    
    
    public function horarios()
    {
        return $this->hasMany(HorarioTramite::class, 'tramite_servicio_id');
    }

    public function telefonos()
    {
        return $this->hasMany(TelefonoTramite::class, 'tramite_servicio_id');
    }

    public function correos()
    {
        return $this->hasMany(CorreoTramite::class, 'tramite_servicio_id');
    }

    public function sitiosWeb()
    {
        return $this->hasMany(SitioWebTramite::class, 'tramite_servicio_id');
    }

    public function fundamentosPlazo()
    {
        return $this->hasMany(FundamentoPlazo::class, 'tramite_servicio_id');
    }

    public function estatus()
    {
        return $this->belongsTo(CatalogoEstatus::class, 'estatus_id');
    }
    
}
