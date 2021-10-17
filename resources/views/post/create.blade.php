@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ route('post.store') }}" method="post">
    @csrf 
    @include('post._form')

</form>
</div>
@endsection