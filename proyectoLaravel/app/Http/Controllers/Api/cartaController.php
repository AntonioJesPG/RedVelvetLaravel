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
        $producto = Product::findOrFail(1);
        return view('api.carta',['producto' => $producto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function siguiente($id){

        $productos = Product::all();

        if($id == $productos->count()){
            $producto = Product::findOrFail($id);
        }else{
            $producto = Product::findOrFail($id+1);
        }
            return view('api.carta',['producto' => $producto]);
    }

    public function anterior($id){
        $producto = Product::findOrFail($id);
        $primerProducto = Product::findOrFail(1);

        if($producto != $primerProducto){
            $producto = Product::findOrFail($id-1);

        }
        return view('api.carta',['producto' => $producto]);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
