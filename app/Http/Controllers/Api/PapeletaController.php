<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papeleta;

class PapeletaController extends Controller
{
    public function searchLicence($number) 
    {
        $papeleta = Papeleta::select('papeletas.nro_licencia', 'papeletas.nombre_conductor', 'papeletas.clase_categoria_licencia', 'infracciones.codigo', 
                                'papeletas.fecha_infraccion', 'papeletas.infraccion', 'papeletas.lugar_intervención', 'papeletas.nro_acta',
                                 'papeletas.servicio', 
                                'infracciones.monto_multa as monto_infraccion', 
                                'papeletas.estado_actual')
                              ->join('infracciones', 'infracciones.idinfracciones', '=', 'papeletas.codigo_infraccion')
                              ->where('nro_licencia', '=', $number)->first();

        if($papeleta){
            
            return $papeleta;
        }
        
        return response()->json([
            'status' => 500,
            'message' => 'El usuario no tiene papeletas',
        ], 500);
    }

    public function getCursosUsuario($id)
    {
        $user = User::find($id);
        if ($user) {
            $cursos = $user->cursos;
            $cursosResponse = collect([]);
            $cursos->each(function ($item, $key) use ($cursosResponse) {
                $cursosResponse->push(Curso::where("id", $item->id)->with("categoria", "profesor")->first());
            });
            return response()->json($cursosResponse->all());
        }
        return response()->json([
            'status'  => 500,
            'message' => 'El usuario no existe',
        ], 500);
    }
}
