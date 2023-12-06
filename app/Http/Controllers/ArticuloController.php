<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = Articulo::all();

        return response()->json(['articulos' => $articulos], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarDatos =  $request->validate(
            [
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'precio' => 'required|numeric|min:0',
                'proveedor_id' => 'required|exists:proveedores,id'
            ]
        );

        $nuevoArticulo = Articulo::create($validarDatos);

        return response()->json(['mensaje' => 'Artículo creado correctamente', 'articulo' => $nuevoArticulo], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $articulo = Articulo::find($id);

        if (!$articulo) {
            return response()->json(['message' => 'articulo no encontrado'], 404);
        }

        return response()->json(['articulo' => $articulo], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articulo = Articulo::findOrFail($id);

        $validarDatos = $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'string',
            'precio' => 'numeric|min:0',
            'proveedor_id' => 'exists:proveedores,id'
        ]);

        $articulo->update($validarDatos);

        return response()->json(['message' => 'Artículo actualizado correctamente', 'articulo' => $articulo], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articulo = Articulo::findOrFail($id);

        $articulo->delete();

        return response()->json(['message' => 'Artículo eliminado correctamente'], 202);
    }
}
