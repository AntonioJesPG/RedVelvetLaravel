@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center formularioHeader">
                    Modificar producto
                </div>
                <div class="card-body" style="padding:30px">

                    <form  method="POST" enctype="multipart/form-data">

                        @method('PUT')

                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre del producto</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$producto->nombre}}">
                        </div>
                        @error('nombre')
                        <p style="color:red">{{$message}}</p>
                        @enderror

                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <input type="text" name="tipo" id="tipo" class="form-control" value="{{$producto->tipo}}">
                        </div>
                        @error('tipo')
                        <p style="color:red">{{$message}}</p>
                        @enderror

                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" name="precio" id="precio" class="form-control" min="0" step="0.1" value="{{$producto->precio}}">
                        </div>
                        @error('precio')
                        <p style="color:red">{{$message}}</p>
                        @enderror

                        <div class="form-group">
                            <label for="imagen">Imagen del producto</label>
                            <img class="rounded float-left" width="10%" src="{{asset(url($url.$producto->imagen))}}">
                            <input type="file" class="form-control" id="imagen" name="imagen" value="{{$producto->imagen}}">
                        </div>
                        @error('imagen')
                        <p style="color:red">{{$message}}</p>
                        @enderror

                        <div class="form-group text-center">
                            <button type="submit" class="btn btnRV" style="padding:8px 100px;margin-top:25px;">
                                Modificar producto
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection