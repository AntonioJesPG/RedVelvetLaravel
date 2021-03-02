<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Product;
use App\Models\Cesta;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{

    public function getIndex(){
        $productos = Product::all();
        return view('productos.index',['arrayProductos' => $productos]);
    }

    public function getCreate(){
        return view('productos.create');
    }

    public function getEdit($id){
        $producto = Product::findOrFail($id);
        $url = 'storage/img/';
        return view('productos.edit',array('id'=>$id),['producto' => $producto, 'url' => $url]);
    }

    public function agregarProducto($id){
        $producto = Product::findOrFail($id);
        if(Cesta::where('product_id',$producto->id)->where('user_id',Auth::id())->count() > 0){
            $cesta = Cesta::where('product_id',$producto->id)->where('user_id',Auth::id())->first();
            $cesta->cantidad = $cesta->cantidad + 1;
            $cesta->save();
        }else{
            $cesta = new Cesta;
            $cesta->user_id = Auth::id();
            $cesta->product_id = $producto->id;
            $cesta->nombreProducto = $producto->nombre;
            $cesta->cantidad = 1;
            $cesta->precio = $producto->precio;
            $cesta->save();
        }

        $productos = Product::all();
        return redirect()->route('listado')->with('arrayProductos',$productos);
    }

    public function eliminarProducto($id){
        $producto = Product::findOrFail($id);
        $producto->delete();

        $productos = Product::all();
        return redirect()->route('listado')->with('arrayProductos',$productos);
    }

    public function agregarACesta($id){
        $producto = Product::findOrFail($id);
        if(Cesta::where('product_id',$producto->id)->where('user_id',Auth::id())->count() > 0){
            $cesta = Cesta::where('product_id',$producto->id)->where('user_id',Auth::id())->first();
            $cesta->cantidad = $cesta->cantidad + 1;
            $cesta->save();
        }else{
            $cesta = new Cesta;
            $cesta->user_id = Auth::id();
            $cesta->product_id = $producto->id;
            $cesta->nombreProducto = $producto->nombre;
            $cesta->cantidad = 1;
            $cesta->precio = $producto->precio;
            $cesta->save();
        }

        $cestaUser = Cesta::where('user_id', Auth::id())->get();
        return redirect()->route('cesta',array('id'=>Auth::id()))->with('arrayCesta',$cestaUser);
    }

    public function quitarDeCesta($id){
        $producto = Product::findOrFail($id);

        $cesta = Cesta::where('product_id',$producto->id)->where('user_id',Auth::id())->first();

        if($cesta->cantidad > 1) {
            $cesta->cantidad = $cesta->cantidad - 1;
            $cesta->save();
        }else{
            $cesta->delete();
        }

        $cestaUser = Cesta::where('user_id', Auth::id())->get();
        return redirect()->route('cesta',array('id'=>Auth::id()))->with('arrayCesta',$cestaUser);
    }

    public function quitarProducto($id){
        $producto = Product::findOrFail($id);

        $cesta = Cesta::where('product_id',$producto->id)->where('user_id',Auth::id())->first();

        $cesta->delete();

        $cestaUser = Cesta::where('user_id', Auth::id())->get();
        return redirect()->route('cesta',array('id'=>Auth::id()))->with('arrayCesta',$cestaUser);
    }

    public function vaciarCesta(){

        Cesta::where('user_id',Auth::id())->delete();


        $cestaUser = Cesta::where('user_id', Auth::id())->get();
        return redirect()->route('cesta',array('id'=>Auth::id()))->with('arrayCesta',$cestaUser);
    }

    public function comprarCesta(){

        $cesta = Cesta::where('user_id',Auth::id())->get();

        $codigo = rand(1,1000000);

        while(Historial::where('codigo',$codigo)->count() > 0){
            $codigo = rand(1,1000000);
        }

        foreach($cesta as $c => $entrada){

            $historial = new Historial;
            $historial->user_id = Auth::id();
            $historial->nombreProducto = $entrada->nombreProducto;
            $historial->cantidad =  $entrada->cantidad;
            $historial->precio = $entrada->cantidad * $entrada->precio;
            $historial->codigo = $codigo;

            $historial->save();

        }

        Cesta::where('user_id',Auth::id())->delete();

        $historial = Historial::where('user_id', Auth::id())->get();
        return redirect()->route('historial',array('id'=>Auth::id()))->with('arrayHistorial',$historial);

    }

}
