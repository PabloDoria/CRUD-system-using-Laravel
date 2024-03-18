<h1>{{$modo}} registro</h1>

@if(count($errors)>0)
    <div class="alert alert-primary" role="alert">
<ul>
    @foreach( $errors->all() as $error)
        <li> {{ $error }} </li>
    @endforeach
</ul>
    </div>
@endif
<div class="form-group">

<form action="">
<br>
<label for="Nombre"> Nombre</label>
<input type="text" class = "form-control" name="Nombre" 
value="{{isset($superheroe->Nombre)?$superheroe->Nombre: old('Nombre') }}" id="Nombre">


</div>

<div class="form-group">

<label for="Alias"> Alias</label>
<input type="text" class = "form-control" name="Alias" 
value="{{isset($superheroe->Alias)?$superheroe->Alias: old('Alias') }}" id="Alias">

</div>

<div class="form-group">

<label for="Descripcion"> Descripcion</label>
<input type="text" class = "form-control" name="Descripcion" 
value="{{isset($superheroe->Descripcion)?$superheroe->Descripcion:old('Descripcion')}}" id="Descripcion"> 

</div>

<div class="form-group">

<label for="Foto"></label>
@if(isset($superheroe->Foto))
<img class = "img-thumbnail img-fluid" src="{{asset('storage').'/'.$superheroe->Foto}}" width="100" alt="">
@endif
<input type="file" class = "form-control"name="Foto" value="" id="Foto">

</div>

<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('superheroe/')}}">Regresar</a>


<br>

</form>