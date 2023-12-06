<?php

namespace App\Models;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'proveedor_id' ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
