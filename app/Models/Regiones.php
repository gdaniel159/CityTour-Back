<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regiones extends Model
{
    protected $table = 'regiones';

    protected $fillable = [
        'nombre',
        'imageUrl',
        'estado'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';

    public function destinos()
    {
        return $this->hasMany(Destino::class);
    }
}
