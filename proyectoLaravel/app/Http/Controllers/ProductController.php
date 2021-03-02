<?php


namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function store(Request $request)
    {
        $messages=[
            'nombre.required' =>'Debe introducir un nombre para el producto',
            'tipo.required' => 'Debe introducir un tipo de producto',
            'precio.required' => 'Debe introducir un precio para el producto',
            'precio.numeric' => 'El precio ha de ser un número',
            'imagen.required' => 'Debe introducir una imagen',
            'imagen.image' => 'Debe introducir un archivo de imagen válido',
        ];
        $request->validate([
            'nombre'=>'required',
            'tipo' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'required|image'
        ],$messages);

        $producto = new Product();
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->tipo=$request->tipo;

        $nombrefoto = time().'_'.$request->file('imagen')->getClientOriginalName();
        $producto->imagen=$nombrefoto;

        if($request->validated()) {
            $producto->save();

            $request->file('imagen')->storeAs('public/img', $nombrefoto);

            $productos = Product::all();
            return redirect()->route('listado')->with('arrayProductos', $productos);
        }
    }

    public function update(Request $request, $id)
    {

        $messages=[
            'nombre.required' =>'Debe introducir un nombre para el producto',
            'tipo.required' => 'Debe introducir un tipo de producto',
            'precio.required' => 'Debe introducir un precio para el producto',
            'precio.numeric' => 'El precio ha de ser un número',
            'imagen.image' => 'Debe introducir un archivo de imagen válido',
        ];
        $request->validate([
            'nombre'=>'required',
            'tipo' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'image'
        ],$messages);

        $producto = Product::findOrFail($id);
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->tipo=$request->tipo;

        if(is_uploaded_file($request->imagen)){
            $nombrefoto = time().'_'.$request->file('imagen')->getClientOriginalName();
            $producto->imagen=$nombrefoto;
            $request->file('imagen')->storeAs('public/img',$nombrefoto);
        }

        if($request->validated()) {
            $producto->save();

            $productos = Product::all();
            return redirect()->route('listado')->with('arrayProductos', $productos);
        }
    }
}