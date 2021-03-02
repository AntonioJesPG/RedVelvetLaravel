@extends('layouts.master')
@section('content')

<div class="crudContainer">
    <a href="{{url('/listado')}}"><button class="btn btnRV ">Volver</button></a>

    <table border="1" class="table tablaCrud">
        <tr><th>Código</th>
            <th>Nombre del producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Fecha</th>
        </tr>

        @foreach($arrayHistorial as $key=>$entrada	)
            <tr>
                <td>{{$entrada->codigo}}</td>
                <td>{{$entrada->nombreProducto}}</td>
                <td>{{$entrada->cantidad}}</td>
                <td>{{$entrada->precio}}</td>
                <td>{{$entrada->created_at}}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection