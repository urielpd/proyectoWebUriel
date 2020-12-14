@extends('layouts.admin')
@section('content')
<main class="container main-crear-curso text-md-center">
		<!-- Title -->
		<h1 class="mt-4 mt-sm-5 text-purple mb-xl-4">Crear tarea</h1>
		<div class="mt-md-4 mt-4">
			<form class="mx-md-auto" action="{{route('admintareas.update',$tarea->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
				<input class="d-block" type="text" name="title" placeholder="Título">
				<textarea name="description" rows="2" cols="50" placeholder="Descripción">
                    {{$tarea->description}}
                </textarea>
				<label class="d-block text-left">Fecha de Entrega</label>
				<input type="date" name="date" value="{{$tarea->date}}">
                <input type="time" name="time" value="{{$tarea->time}}">
                @if(!$tarea->file==NULL)
			    <label for="file" class="d-block text-left">Archivo Actual: </label>
			    <a href="{{asset("tareas/$tarea->file")}}">{{$tarea->file}}</a>
			    <label for="file" class="d-block text-left">Modificar Archivo: </label>
			    <input type="file" name="file" enctype>
			    @else
			    <label for="file" class="d-block text-left">Archivo Opcional: </label>
			    <input type="file" name="file" enctype>
			    @endif
				<label for="file" class="d-block text-left">Archivo Opcional</label>
				<input type="file" name="file" enctype>
				<input type="submit" value="Crear" id="submit" class="btn btn-primary bg-yellow text-dark">
			
            </form>
		</div>
	</main>
@endsection