<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    
    // Tabla
    protected $table = 'usuario';
        
    // Campos a utilizar
    protected $fillable = array(
        'nombre',
        'username',
        'tipo_usuario_id'
    );

    // Campos que no podran ser accedidos
    protected $hidden = [
        'created_at','updated_at','password'
    ];

    // Primary Key
    protected $primaryKey = 'id';

    // Definicio de la relacion de muchos a uno (inversa, solo si tiene id fk)
    public function tipo_usuario(){
        return $this->belongsTo(TipoUsuario::class);
    }

}
