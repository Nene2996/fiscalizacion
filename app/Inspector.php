<?php

namespace App;
use App\Papeleta;

use Illuminate\Database\Eloquent\Model;

class Inspector extends Model
{
    protected $table = 'inspectores';

    protected $fillable = [
        'idinspectores', 
        'nombres_apellidos', 
        'dni', 
        'estado'
    ];

    public function papeletas()
    {
        return $this->hasMany(Papeleta::class);
    }
}
