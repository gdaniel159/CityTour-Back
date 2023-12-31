<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro_paquete extends Model
{
    protected $table = 'registro_paquete';

    protected $fillable = [
        'detalle_pack_id',
        'cliente_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';

    public function detalle_paquete()
    {
        return $this->belongsTo(Detalle_paquete::class, 'detalle_pack_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
