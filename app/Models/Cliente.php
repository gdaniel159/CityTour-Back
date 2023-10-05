<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';

    protected $fillable = array(
        'nombre',
        'DNI',
        'correo',
        'mensaje'
    );

    protected $hidden = [
        'created_at','updated_at'];

    protected $primaryKey = 'id';

    public function registro_paquete(){
        return $this->hasMany(Registro_paquete::class);
    }

}
