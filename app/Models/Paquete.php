<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'paquete';

    protected $fillable = array(
        'descripcion',
        'precio',
        'duracion',
        'estado',
        'destino_i'
    );

    protected $hidden = [
        'create_ad', 'update_at'
    ];

    protected $primaryKey='id';

    public function destino(){
        return $this ->belongsTo(Destino::class);
    }

    public function detalle_paquete(){
        return $this->hasMany(Detalle_paquete::class);
    }

}
