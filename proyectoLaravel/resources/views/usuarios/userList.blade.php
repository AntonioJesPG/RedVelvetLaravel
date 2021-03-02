@extends('layouts.master')
@section('content')

<div class="crudContainer">
    <a href="{{url('/listado')}}"><button class="btn btnRV ">Volver</button></a>
    <a href="{{url('/listado/user/create')}}"><button class="btn btnRV">Agregar usuario</button></a>

    <table border="1" class="table tablaCrud">
       <tr><th>Id</th>
           <th>Email</th>
           <th>Nombre</th>
           <th>Apellidos</th>
           <th>Direccion</th>
           <th>Ciudad</th>
           <th>Teléfono</th>
           <th></th>
           <th></th>
       </tr>

        @foreach($arrayUsuarios as $key=>$usuario	)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->apellido}}</td>
                <td>{{$usuario->direccion}}</td>
                <td>{{$usuario->ciudad}}</td>
                <td>{{$usuario->telefono}}</td>
                <td><a href="{{url('/listado/user/edit/'.$usuario->id)}}"><button class="btn btnRV">Modificar</button></a></td>
                <td>@if(!$usuario->roles->contains(1))<a href="{{url('/listado/user/delete/'.$usuario->id)}}"><button class="btn btnRV">Eliminar</button></a>@endif</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection