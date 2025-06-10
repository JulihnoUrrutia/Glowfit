<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function compra()
    {
        return $this->belongsTo(Compra::class)->withTimestamps()->withPivot('cantidad', 'precio_compra', 'precio_venta');
    }
    public function venta()
    {
        return $this->belongsTo(Venta::class)->withTimestamps()->withPivot('cantidad', 'descuento', 'precio_venta');
    }
    public function categoria()
    {
        return $this->BelongsToMany(Categorias::class)->withTimestamps();
    }
    public function marca()
        
    {
        return $this->belongsTo(Marca::class);
     }

     public function presentaciones()
     {
         return $this->belongsTo(Presentaciones::class);
     }


}
