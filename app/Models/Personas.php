<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    
    }
    public function proveedore()
    {
        return $this->hasMany(Proveedore::class);
    }
    
    public function cliente()

    {
        return $this->hasMany(Cliente::class);
    }



    


}
