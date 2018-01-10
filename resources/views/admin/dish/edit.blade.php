@extends ('layouts.admin')
@section ('content')

@if ($errors->count()>0)
@foreach ($errors->all() as $error)
<li > {{ $error }}  </li>
@endforeach
@endif
<div class="col-md-10">
<form action="{{ route('dish.update', $dish) }}" enctype="multipart/form-data" method="post">
    <input type="hidden" name="_method" value="PUT">
  {{ csrf_field() }}
  <div class="form-group">
    <input type="text" name="title" value="{{ $dish->title }}" class="form-control" placeholder="Enter dish">
    <br>
    <label for="Photo">Photo</label>
    <div class="file-loading">
    <input  name="photo" multiple type="file" accept="image/*">
</div>
<br>
  <label for="comment">Description</label>
  <textarea class="form-control" name="description" rows="5" id="comment"> {{ $dish->description }} </textarea>
  </div>
  <br>

  <label for="usr">Price</label>
 <input type="text" name="price" value= "{{ $dish->price }}" class="form-control" id="usr">

 <br>

 <label for="sel1">Select Menu</label>
<select class="form-control" id="sel1">
  @foreach ($menus as $menu)
  <option name="menu_id" value="{{ $menu->id }}" >{{$menu->title}}</option>
@endforeach
</select>

<br>

  <button type="submit" class="btn btn-primary">Create</button>
</form>
</div>
@endsection
