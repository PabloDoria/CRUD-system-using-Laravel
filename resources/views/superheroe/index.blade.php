@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}

@endif

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Alias</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($superheroes as $superheroe)
        <tr>
            <td>{{$superheroe->id}}</td>

            <td>
                <img class = "img-thumbnail img-fluid" src="{{asset('storage').'/'.$superheroe->Foto}}" width="100" alt="">
            </td>

            <td>{{$superheroe->Nombre}}</td>
            <td>{{$superheroe->Alias}}</td>
            <td>{{$superheroe->Descripcion}}</td>
            <td>
            
            <a href="{{ url('/superheroe/'.$superheroe->id.'/edit')}}" class="btn btn-warning">
                Editar
            </a>
            | 

            <form action="{{ url('/superheroe/'.$superheroe->id)}}" class = "d-inline" method="post">
            @csrf
            {{ method_field('DELETE')}}
            <input class = "btn btn-danger" type="submit" onclick= "return confirm('¿Quieres borrar?')" value="Borrar">    
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ url('superheroe/create')}}" class="btn btn-success btn-floating" style="position: fixed; bottom: 20px; right: 20px;">
    Agregar registro
</a>


</div>
@endsection
