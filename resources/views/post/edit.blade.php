@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
    @csrf @method('PATCH')
    @include('post._form')
</form>
</div>
@endsection