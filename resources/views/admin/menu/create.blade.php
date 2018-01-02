@extends ('layouts.admin')
@section ('content')

@if ($errors->count()>0)
@foreach ($errors->all() as $error)
<li > {{ $error }}  </li>
@endforeach
@endif
<div class="col-md-4">
<form action="{{ route('menu.store') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="Menu">Menu</label>
    <input type="text" name="title" class="form-control" placeholder="Enter menu">
  </div>

  <button type="submit" class="btn btn-primary">Create</button>
</form>
</div>
@endsection
