<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_paquete extends Model
{
    protected $table = 'detalle_paquete';

    protected $fillable = array(
        'paquete_id'
    );

    protected $hidden=[
        'created_at','updated_at'
    ];

    protected $primaryKey='id';

    public function detalle_paquete(){
        return $this->belongTo(Detalle_paquete::class);
    }

    public function registro_paquete(){
        return $this->hasMany(Registro_paquete::class);
    }
}
