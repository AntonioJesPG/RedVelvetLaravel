@extends('layouts.master')
@section('content')
    <div	class="row">
        @foreach($arrayProductos as $key=>$producto	)
            <div	class="col-xs-6	col-sm-4	col-md-3	text-center" style="padding: 20px">
                <div class="card cardIndex">
                        <img	src="{{'storage/img/'.$producto->imagen}}"	style="width:150px; height:150px"/>
                        <div class="container">
                            <h4	style="min-height:45px;margin:5px	0	5px	0">
                                {{$producto->nombre}}
                            </h4>
                            <p	style="min-height:45px;margin:5px	0	10px	0">
                                Precio : {{$producto->precio}} €
                            </p>
                            @if (Auth::check() && Auth::user()->roles->contains(1))
                                <a href="{{url('/listado/edit/'.$producto->id)}}"><button class="btn btnIndex">Editar</button></a>
                                <a href="{{url('/listado/eliminarProducto/'.$producto->id)}}"><button class="btn btnIndex">Eliminar</button></a>
                            @endif
                            @if (Auth::check() && Auth::user()->roles->contains(2))
                                <a href="{{url('/listado/agregarProducto/'.$producto->id)}}"><button class="btn btnIndex">Agregar a la cesta</button></a>
                            @endif
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection