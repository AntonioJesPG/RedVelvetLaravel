@extends('layouts.master')
@section('content')

<div class="crudContainer">
    <a href="{{url('/listado')}}"><button class="btn btnRV ">Volver</button></a>
    <a href="{{url('/listado/vaciarCesta')}}"><button class="btn btnRV ">Vaciar cesta</button></a>
    <a href="{{url('/listado/comprarCesta')}}"><button class="btn btnRV ">Comprar</button></a>

    <table border="1" class="table tablaCrud">
        <tr><th>Nombre Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th></th>
            <th></th>
        </tr>

        @foreach($arrayCesta as $key=>$entrada	)
            <tr>
                <td>{{$entrada->nombreProducto}}</td>
                <td>{{$entrada->cantidad}}</td>
                <td>{{$entrada->cantidad * $entrada->precio}}</td>
                <td><a href="{{url('/listado/quitarDeCesta/'.$entrada->product_id)}}"><button class="btn btnRV ">-</button></a><a href="{{url('/listado/agregarACesta/'.$entrada->product_id)}}"><button class="btn btnRV ">+</button></a></td>
                <td><a href="{{url('/listado/quitarProducto/'.$entrada->product_id)}}"><button class="btn btnRV ">Eliminar</button></a></td>
            </tr>
        @endforeach
    </table>
</div>

@endsection