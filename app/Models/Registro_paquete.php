<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_paquete extends Model
{
    protected $table = 'registro_paquete';

    protected $fillable = array(
        'detalle_pack_id',
        'cliente_id'
    );

    protected $hidden = [
        'created_at','updated_at'
    ];

    protected $primaryKey = 'id';

    public function detalle_paquete(){
        return $this->belongsTo(Detalle_paquete::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
