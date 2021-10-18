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
<h1>Lista de Post</h1>

<a href="{{ route('post.create') }}" class="btn btn-primary">Nuevo Post</a>

 <div class="d-flex flex-wrap justify-content-between align-items-start">
    @foreach($posts as $post)
    <div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">
        @if ($post->image)
            <img src="{{ asset('storage'.'/'.$post->image)}}" class="card-img-top" alt="..."  height="200">
        @endif
        
               
        <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <h4 class="card-subtitle">{{ $post->cover }}</h4>
        <p class="card-text">{{ $post->description }}</p>
        <a href="{{ route('post.show',$post)}}" class="btn btn-primary">ver más</a>
        </div>
    </div>
    @endforeach
</div>   


{{-- <table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Cover</th>
            <th>titulo</th>
            <th>Descripción</th>
            <th>imagenes</th>
            <th>Video</th>
            <th>categoria</th>
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
            <td>{{ $post->categories->category }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('post.edit',$post) }}" >Editar</a>
                <form action="{{ route('post.destroy',$post)}}" method="post" class="d-inline">|
                    @csrf @method('DELETE')
                    <input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('Deseas borrar el perfil?')">
                </form>
            </td>
        </tr>
        @endforeach  
    </tbody>
    
</table> --}}
</div>
@endsection