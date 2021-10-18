
<div class="form-group">
    <label for="cover">Comment</label>
    <input id="cover" class="form-control" type="text" name="cover"
    value="{{ isset($post->cover)?$post->cover:old('cover')}} ">
</div> 

<button type="submit">Enviar</button>

<a href="{{ route('post.index')}}">Regresar</a>