<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Papeleta;

class InfraccionController extends Controller
{
    public function buscarinfraccion($number){
        $papeleta = Papeleta::select('papeletas.nro_licencia', 'papeletas.nombre_conductor', 'papeletas.clase_categoria_licencia',
                                'infracciones.codigo', 'papeletas.fecha_infraccion', 'infracciones.infraccion', 'papeletas.lugar_intervencion', 
                                'papeletas.nro_acta', 'papeletas.servicio', 
                                'infracciones.monto_multa as monto_infraccion', 'infracciones.sancion_administrativa',
                                'papeletas.estado_actual')
                                ->join('infracciones', 'infracciones.id', '=', 'papeletas.codigo_infraccion')
                                ->where('nro_licencia', $number)
                                ->orderBy('papeletas.fecha_infraccion', 'ASC')->get()->toArray();

        return $papeleta;
    }
}
