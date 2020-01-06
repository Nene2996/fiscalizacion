<?php

namespace App;
use App\Papeleta;

use Illuminate\Database\Eloquent\Model;

class Infraccion extends Model
{
    protected $table = 'infracciones';

    protected $fillable = [
        'idinfracciones', 
        'infraccion', 
        'codigo', 
        'agente_infractor', 
        'multa_uit', 
        'monto_multa', 
        'sancion_administrativa', 
        'descuento_15_dia', 
        'descuento_resolucion'
    ];

    public function papeletas(){
        return $this->hasMany(Papeleta::class);
    }
}
