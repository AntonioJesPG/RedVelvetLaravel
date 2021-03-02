@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center formularioHeader">
                    Añadir usuario
                </div>
                <div class="card-body" style="padding:30px">

                    <form method="POST">

                    @method('PUT')

                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
                    </div>
                    @error('email')
                    <p style="color:red">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    @error('password')
                    <p style="color:red">{{$message}}</p>
                    @enderror

                    @if(Auth::user()->roles->contains(1))
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select name="rol" id="rol" class="form-control">
                                @foreach($roles as $r => $rol)
                                    <option value="{{$rol->name}}"  @if($rol->name == 'user') selected @endif  >{{$rol->description}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
                    </div>
                    @error('nombre')
                    <p style="color:red">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido')}}">
                    </div>
                    @error('apellido')
                    <p style="color:red">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion')}}">
                    </div>
                    @error('direccion')
                    <p style="color:red">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{old('ciudad')}}">
                    </div>
                    @error('ciudad')
                    <p style="color:red">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" value="{{old('telefono')}}">
                    </div>
                    @error('telefono')
                    <p style="color:red">{{$message}}</p>
                    @enderror


                    <div class="form-group text-center">
                        <button type="submit" class="btn btnRV" style="padding:8px 100px;margin-top:25px;">
                            Añadir usuario
                        </button>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection