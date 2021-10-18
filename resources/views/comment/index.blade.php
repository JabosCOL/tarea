@extends('layouts.app')

@section('content')
    
<div class="container">

    @if (Session::has('mensaje'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{  Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
<h1>Lista de Comentarios</h1>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Usuario</th>
            <th>Post</th>
            <th>Comentario</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($comments as $comment)           
        
        <tr>
            <td>{{ $comment->users->name}} {{ $comment->users->lastname }}</td>
            <td>{{ $comment->posts->title }}</td>
            <td>{{ $comment->comments }}</td>
        
            <td>
                <a class="btn btn-primary" href="{{ route('comment.edit',$comment) }}" >Editar</a>
                <form action="{{ route('comment.destroy',$comment)}}" method="post" class="d-inline">|
                    @csrf @method('DELETE')
                    <input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('Deseas borrar este comentario??')">
                </form>
            </td>
        </tr>
        @endforeach  
    </tbody>
    
</table>

<a href="{{ route('comment.create') }}" class="btn btn-primary">Nuevo comentario</a>
</div>
@endsection