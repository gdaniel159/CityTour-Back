<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regiones extends Model
{
    protected $table = 'regiones';

    protected $fillable = array(
        'nombre',
        'estado'
    );

    protected $hidden=[
        'created_ad',
        'update_at'
    ];

    protected $primaryKey = 'id';

    public function destino(){
        return  $this->hasmany(Destino::class);
    }
}
