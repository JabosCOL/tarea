@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ route('profile.update') }}" method="post">
    @csrf @method('PATCH')
    @include('profile._form')
</form>
</div>
@endsection