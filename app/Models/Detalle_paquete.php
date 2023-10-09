<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_paquete extends Model
{
    protected $table = 'detalle_paquete';

    protected $fillable = [
        'paquete_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';

    public function registro_paquetes()
    {
        return $this->hasMany(Registro_paquete::class);
    }

    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'paquete_id');
    }
}
