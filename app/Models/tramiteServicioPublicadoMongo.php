<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class tramiteServicioPublicadoMongo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'tramitesServicioPublicados';
    protected $guarded = []; // para permitir todos los campos

    protected $fillable = [
        'modalidad',
        'fundamentoExtension',
        'areaObligada',
        'nombreTramite',
        'descripcionTramite',
        'tipo',
        'pasos',
        'requisitos',
        'fundamentos',
        'documentosRequeridos',
        'formatosRequeridos',
        'formatoRequerido',
        'fundamentoFormato',
        'ultimaFechaPublicacion',
        'tipoFormato',
        'otroFormato',
        'requiereInspeccion',
        'objetivoInspeccion',
        'fundamentoInspeccion',
        'plazo',
        'plazoSujeto',
        'plazoSolicitante',
        'fundamentosPlazo',
        'montos',
        'fundamentoMonto',
        'vigencia',
        'fundamentoVigencia',
        'criterio',
        'fundamentoCriterio',
        'domicilios',
        'horarios',
        'telefonos',
        'correos',
        'sitiosWebs',
        'demasDatosRelativos',
        'informacion',
        'fundamentoInformacion',
        'tramiteEnLinea',
        'cargarDocumentos',
        'seguimiento',
        'informacionMedios',
        'respuestaResolucion',
        'utilizaFirma',
        'realizarNotificaciones',
        'demasInformacion',
        'tramite_mysql_id',
        'activo',
        'origen'
    ];
    
}
