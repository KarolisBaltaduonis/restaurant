@extends ('layouts.admin')
@section ('content')
  <div class="col-md-4">
    <ul class="list-group">
      <div> {{session('message')}} </div>
      @foreach($menus as $menu)
      <li class="list-group-item"> {{ $menu->title }}
         <a href="{{ route ('menu.edit', $menu) }}">
           <button type="button" class="btn btn-primary float-right" name="button">Edit</button> </a>
             <form action="{{ route('menu.destroy', $menu) }}" method="POST"
                 style="display: inline"
                 onsubmit="return confirm('Are you sure?');">
               <input type="hidden" name="_method" value="DELETE">
               {{ csrf_field() }}
               <button class="btn btn-danger pull-right">Delete</button>
           </form>  </li>

    @endforeach
  </ul>
<li class="btn btn-default"> <a href="{{route('admin')}}" class="btn btn-default">Atgal </a> </li>
<li class="btn btn-default"><a href="{{route('menu.create')}}" class="btn btn-default">Sukurti</a> </li> </div>
 @endsection
