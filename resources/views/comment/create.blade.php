@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ route('comment.store') }}" method="post">
    @csrf 
    @include('comment._form')

</form>
</div>
@endsection