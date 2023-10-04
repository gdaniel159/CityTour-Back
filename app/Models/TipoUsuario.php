<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{

    // Tabla
    protected $table = 'tipo_usuario';
    
    // Campos a utilizar
    protected $fillable = array(
        'nombre'
    );

    // Campos que no podran ser accedidos
    protected $hidden = [
        'created_at','updated_at'
    ];

    // Primary Key
    protected $primaryKey = 'id';

    // Definicio de la relacion de uno a muchos
    public function usuario(){
        return $this->hasMany(Usuario::class);
    }

}
