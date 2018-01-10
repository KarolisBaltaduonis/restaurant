@extends ('layouts.admin')
@section ('content')

@if ($errors->count()>0)
@foreach ($errors->all() as $error)
<li > {{ $error }}  </li>
@endforeach
@endif
<div class="col-md-4">
<form action="{{ route('menu.update', $menu) }}" method="post">
  <input type="hidden" name="_method" value="PUT">

  {{ csrf_field() }}
  <div class="form-group">
    <label for="Menu">Menu</label>
    <input type="text" name="title" class="form-control" value="{{$menu->title}}" placeholder="Enter menu">
  </div>

  <button type="submit" class="btn btn-primary">Edit</button>
</form>
</div>
@endsection
