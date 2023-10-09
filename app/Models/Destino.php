<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $table = 'destino';

    protected $fillable = [
        'nombre',
        'estado',
        'region_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';

    public function paquetes()
    {
        return $this->hasMany(Paquete::class);
    }

    public function regiones()
    {
        return $this->belongsTo(Regiones::class, 'region_id');
    }
}
