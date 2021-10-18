
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
    <label for="image" >Imagen</label>
        @if (isset($post->image))
            <img src="{{  asset(('storage').'/'.$post->image) }}"   whidth="100" height="100"  >
        @endif    
        <input type="file" class="form-control" name="image" id="image" value=""><br>
</div>

<div class="form-group">
    <label for="video">Video</label>
    @if (isset($post->video))
        <img src="{{  asset(('storage').'/'.$post->video) }}"   whidth="100" height="100"  >
    @endif    
    <input type="file" class="form-control" name="video" id="video" value=""><br>
</div>

<div class="form-group">
    @if ($user_id )
    <input id="users_id" class="form-control" type="number" name="users_id" hidden value="{{$user_id}}" >
    @endif
</div>
<div class="form-group">  
    <label for="category_id" >Categoria</label>  <br>
    <select name="category_id" id="category_id">
        <option value="">Seleccione</option>
        @foreach($categories as $id => $name)
            <option value="{{$id}}"  @if ($id === $post->category_id) selected @endif> {{$name}}</option>
        @endforeach    
    </select>   
    
</div>

<button type="submit">Enviar</button>

<a href="{{ route('post.index')}}">Regresar</a>