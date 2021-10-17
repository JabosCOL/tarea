
<div class="form-group">
    <label for="cover">Cover</label>
    <input id="cover" class="form-control" type="text" name="cover"
    value="{{ isset($post->cover)?$post->cover:old('cover')}} ">
</div> 
<div class="form-group">
    <label for="title">Titulo</label>
    <input id="title" class="form-control" type="text" name="title"
    value="{{ isset($post->title)?$post->title:old('title')}} ">
</div>
<div class="form-group">
    <label for="description">Descripción</label>
    <input id="description" class="form-control" type="text" name="description"
    value="{{ isset($post->description)?$post->description:old('description')}} ">
</div>

<div class="form-group">
    <label for="image">Imagen</label>
    <input id="image" class="form-control" type="text" name="image"
    value="{{ isset($post->image)?$post->image:old('image')}} ">
</div>
<div class="form-group">
    <label for="video">Video</label>
    <input id="video" class="form-control" type="text" name="video"
    value="{{ isset($post->video)?$post->video:old('video')}} ">
</div>
<div class="form-group">
    @foreach ($users as $id =>$name)
    <input id="users_id" class="form-control" type="number" name="users_id" hidden value="{{$id}}" disabled>
    @endforeach 
    
    @foreach($categories as $id =>$name)
    <input id="category_id" class="form-control" type="number" name="category_id" hidden value="{{$id}}" disabled>
    @endforeach 
</div>

<button type="submit">Enviar</button>

<a href="{{ route('post.index')}}">Regresar</a>