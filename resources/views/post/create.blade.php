@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf 
    @include('post._form')

</form>
</div>
@endsection