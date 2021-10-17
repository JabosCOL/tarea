@extends('layouts.app')

@section('content')
    
<div class="container">
<h1>Lista de Post</h1>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Cover</th>
            <th>titulo</th>
            <th>Descripción</th>
            <th>imagenes</th>
            <th>Video</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($posts as $post)           
        
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->cover }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->image }}</td>
            <td>{{ $post->video }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('post.edit',$post) }}" >Editar</a>
                <form action="{{ route('post.destroy',$post->id)}}" method="post" class="d-inline">|
                    @csrf @method('DELETE')
                    <input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('Deseas borrar el perfil?')">
                </form>
            </td>
        </tr>
        @endforeach  
    </tbody>
    
</table>

<a href="{{ route('post.create') }}" class="btn btn-primary">Nuevo Post</a>
</div>
@endsection