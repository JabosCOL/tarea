@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ route('profile.store') }}" method="post">
    @csrf 
    @include('profile._form')

</form>
</div>
@endsection