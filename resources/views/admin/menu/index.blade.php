@extends ('layouts.admin')
@section ('content')
  <div class="col-md-4">
    <ul class="list-group">
      <div> {{session('message')}} </div>
      @foreach($menus as $menu)
      <li class="list-group-item"> {{ $menu->title }}  </li>

    @endforeach
  </ul>
<li class="btn btn-default"> <a href="{{route('admin')}}" class="btn btn-default">Atgal </a> </li>
<li class="btn btn-default"><a href="{{route('menu.create')}}" class="btn btn-default">Sukurti</a> </li> </div>
 @endsection
