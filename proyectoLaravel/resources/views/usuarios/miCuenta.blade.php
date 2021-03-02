
@extends('layouts.master')

@section('content')
<div class="contenedorMicuenta">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="https://img.icons8.com/coffee/" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">{{$user->nombre}} {{$user->apellido}}</h6>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Datos de usuario</h6>
                                <div class="row">
                                    <div class="col">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{$user->email}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Teléfono</p>
                                        <h6 class="text-muted f-w-400">{{$user->telefono}}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Dirección</p>
                                        <h6 class="text-muted f-w-400">{{$user->direccion}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Ciudad</p>
                                        <h6 class="text-muted f-w-400">{{$user->ciudad}}</h6>
                                    </div>
                                    <a href="{{url('/listado')}}"><button class="btn btnRV">Volver</button></a>
                                    <a href="{{url('/listado/user/edit/'.Auth::id())}}"><button class="btn btnRV">Modificar datos</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection