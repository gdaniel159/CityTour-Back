<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
        
    protected $fillable = [
        'nombre',
        'username',
        'tipo_usuario_id',
        'password',
        'correo'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 
    ];

    protected $primaryKey = 'id';

    public function tipo_usuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id');
    }
}
