@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ route('profile.update',$profile->id) }}" method="post">
    @csrf @method('PATCH')
    @include('profile._form')
</form>
</div>
@endsection