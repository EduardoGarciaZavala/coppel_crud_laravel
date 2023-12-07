<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todosProveedores = proveedor::all();

        return response()->json(['proveedores' => $todosProveedores], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarDatos = $request->validate(
            [
                'nombre' => 'required|string|max:250',
                'email' => 'required|email|unique:proveedores',
                'telefono' => 'required|max:10',
                'direccion' => 'required|string|max:300'
            ]
        );

        $nuevoProveedor = Proveedor::create($validarDatos);

        return response()->json(['mensaje' => 'Proveedor creado correctamente', 'proveedor' => $nuevoProveedor], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }

        return response()->json(['proveedor' => $proveedor], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proveedorActualizar = Proveedor::find($id);

        $validarDatos = $request->validate(
            [
                'nombre' => 'required|string|max:250',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('proveedores')->ignore($id),
                ],
                'telefono' => 'required|max:10',
                'direccion' => 'required|max:300'
            ]
        );

        $proveedorActualizar->update($validarDatos);
        return response()->json(['mensaje' => 'Proveedor actualizado correctamente', 'proveedor' => $proveedorActualizar], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedorEliminar = Proveedor::find($id);

        if(!$proveedorEliminar)
        {
            return response()->json(['mensaje' => 'Proveedor no encontrado'], 404);
        }

        $proveedorEliminar->delete();

        return response()->json(['mensaje' => ' Proveedor eliminado correctamente'], 202);
    }
}
