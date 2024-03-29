<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::all();
        return response()->json($productos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nombre' => ['required','string'],
            'tipo' => ['required'],
            'precio' => ['required','number'],
            'imagen' => ['required'],
        ]);

        Product::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'precio' => $request->precio,
            'imagen' => $request->imagen
        ]);

        return response()->json(['result','OK']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = Product::findOrFail($id);
        return response()->json($productos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Product::findOrFail($id);

        Validator::make($request->all(), [
            'nombre' => ['required','string'],
            'tipo' => ['required'],
            'precio' => ['required','number'],
            'imagen' => ['required'],
        ]);

        $producto->nombre = $request->nombre;
        $producto->tipo = $request->tipo;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;

        $producto->save();

        return response()->json(['result','OK']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['result','OK']);
    }
}
