<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'paquete';

    protected $fillable = [
        'descripcion',
        'precio',
        'duracion',
        'estado',
        'destino_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';

    public function destino()
    {
        return $this->belongsTo(Destino::class, 'destino_id');
    }

    public function detalle_paquete()
    {
        return $this->hasMany(Detalle_paquete::class);
    }
}
