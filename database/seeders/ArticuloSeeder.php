<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Articulo::create([
            'nombre' => 'Artículo 1',
            'descripcion' => 'Descripción del Artículo 1',
            'precio' => 19.99,
            'proveedor_id' => 1,
        ]);

        Articulo::create([
            'nombre' => 'Artículo 2',
            'descripcion' => 'Descripción del Artículo 2',
            'precio' => 29.99,
            'proveedor_id' => 2,
        ]);
    }
}
