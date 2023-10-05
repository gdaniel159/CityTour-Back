<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $table = 'destino';

    protected $fillable = array(
        'nombre',
        'estado',
        'region_id'
    );

    protected $hiden = [
        'create_at', 'update_at'
    ];

    protected $primaryKey = 'id';

    public function paquete(){
        return $this->hasMany(Destino::class);
    }

    public function regiones(){
        return $this->belongsTo(Regiones::class);
    }
}
