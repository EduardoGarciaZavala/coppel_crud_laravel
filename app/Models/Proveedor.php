<?php

namespace App\Models;

use App\Models\Articulo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $fillable = ['nombre', 'email', 'telefono', 'direccion'];

    //proveedore tiene algunos articulos
    public function articulos()
    {
        return $this->hasMany(Articulo::class);
    }
}
