<?php

namespace App;
use App\Inspector;
use App\Infraccion;

use Illuminate\Database\Eloquent\Model;

class Papeleta extends Model
{
    protected $table = 'papeletas';

    protected $fillable = [
        'idpapeletas', 
        'ruc_dni', 
        'nombre_razon_social', 
        'placa_vehiculo',
        'lugar_intervención',
        'origen',
        'destino',
        'nombre_conductor',
        'nro_licencia',
        'fecha_infraccion',
        'hora_infraccion',
        'clase_categoria_licencia',
        'codigo_infraccion',
        'infraccion',
        'observaciones_verificación',
        'manisfestacion_usuario',
        'nro_acta',
        'servicio',
        'estado_actual',
        'fecha_cancelacion',
        'observacion',
        'nro_boleta_pago',
        'idinspectores',
        'fecha_registro_infraccion'
    ];

    public function inspector()
    {
        $this->belongsTo(Inspector::class);
    }

    public function infraccion()
    {
        $this->belongsTo(Infraccion::class, 'codigo_infraccion', 'idinfracciones');
    }
    
}
