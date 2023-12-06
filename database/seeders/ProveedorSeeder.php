<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ejemplo de creación de proveedores
        Proveedor::create([
            'nombre' => 'Proveedor 1',
            'email' => 'proveedor1@example.com',
            'telefono' => '123456789',
            'direccion' => 'direccion calle fulana #12234'
        ]);

        Proveedor::create([
            'nombre' => 'Proveedor 2',
            'email' => 'proveedor2@example.com',
            'telefono' => '987654321',
            'direccion' => 'direccion calle fulana #4321'
        ]);
    }
}
