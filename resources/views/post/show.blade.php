@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12 col-sm-10 col-lg-8 mx-auto">
        @if($posts->image)
            <img class="card-img-top"
            src="" alt="">
        @endif
        <div class="bg-white p-5 shadow rounded">
            <h1>{{ $posts->title }}</h1>
            <h3>{{ $posts->cover }}</h3>
            <p class="text-secondary">{{ $posts->description }}</p>
            @if($comments->posts_id == $posts->id)
            @foreach($comments as $comment)
            <p class="text-danger">{{ $comment }}</p>
            @endforeach
            @endif
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('post.index') }}">Regresar</a>
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-primary" href="{{ route('post.edit', $posts) }}">Editar</a>
                    <form action="{{ route('post.destroy',$posts)}}" method="post" class="d-inline">|
                        @csrf @method('DELETE')
                        <input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('Deseas borrar el post?')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection