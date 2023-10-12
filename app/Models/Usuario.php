<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Usuario extends Model implements AuthenticatableContract
{
    use Authenticatable;
    
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
