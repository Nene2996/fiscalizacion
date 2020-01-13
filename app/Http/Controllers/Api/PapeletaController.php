<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papeleta;
use App\Inspector;
use DB;

use Illuminate\Support\Collection as Collection;

class PapeletaController extends Controller
{
    public function searchLicence($number) 
    {

        $papeleta = Papeleta::select('papeletas.nro_licencia', 'papeletas.nombre_conductor', 'papeletas.clase_categoria_licencia',
                                 'infracciones.codigo', 'papeletas.fecha_infraccion', 'infracciones.infraccion', 'papeletas.lugar_intervencion', 
                                 'papeletas.nro_acta', 'papeletas.servicio', 
                                'infracciones.monto_multa as monto_infraccion', 'infracciones.sancion_administrativa',
                                'papeletas.estado_actual')
                              ->join('infracciones', 'infracciones.id', '=', 'papeletas.codigo_infraccion')
                              ->where('nro_licencia', $number)->get()->toArray();


        if($papeleta){

            return response()->json($papeleta);
            //return $papeleta->toArray();
            
        }
        else{
            return response()->json([
                'status' => 500,
                'message' => 'El usuario no tiene papeletas',
            ], 500);
        }
        
    }

    public function inpectores(){
        $inspector = Inspector::all();
        return response()->json($inspector);
        
    }

    public function searchPlate($plate)
    {
        $infracccion = Papeleta::select('papeletas.nro_licencia', 'papeletas.nombre_conductor', 'papeletas.clase_categoria_licencia',
                                        'papeletas.placa_vehiculo', 'papeletas.nombre_razon_social', 'infracciones.codigo', 'papeletas.fecha_infraccion',
                                        'infracciones.infraccion', 'papeletas.lugar_intervencion', 'papeletas.nro_acta', 'infracciones.agente_infractor', 
                                        'infracciones.monto_multa', 
                                        'infracciones.sancion_administrativa', 'papeletas.estado_actual')
                                 ->join('infracciones', 'infracciones.id', '=', 'papeletas.codigo_infraccion')
                                 ->where('placa_vehiculo', $plate)
                                 ->where('infracciones.agente_infractor', 'Transportista')
                                 ->get()->toArray();

        if($infracccion){
            return response()->json($infracccion);
        }
        else{
            return response()->json([
                'status' => 500,
                'message' => 'El vehículo no tiene historial de papeletas'
            ], 500);
        }
        
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
