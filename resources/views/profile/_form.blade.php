
<div class="form-group">
    <label for="title">Titulo</label>
    <input id="title" class="form-control" type="text" name="title"
    value="{{ isset($profile->id)?$profile->id:old('id')}} ">
</div> 
<div class="form-group">
    <label for="biography">Descripcion</label>
    <input id="biography" class="form-control" type="text" name="biography"
    value="{{ isset($profile->biography)?$profile->biography:old('biography')}} ">
</div>
<div class="form-group">
    <label for="website">Website</label>
    <input id="website" class="form-control" type="text" name="website"
    value="{{ isset($profile->website)?$profile->website:old('website')}} ">
</div>
<div class="form-group">
    @if ($id)
        <input id="users_id" class="form-control" type="number" name="users_id" hidden value="{{$id}}" disabled>
    @endif    
</div>

<button type="submit">Enviar</button>

<a href="{{ route('profile.index')}}">Regresar</a>