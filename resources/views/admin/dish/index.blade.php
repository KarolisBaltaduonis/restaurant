@extends ('layouts.admin')
@section ('content')
<div class="col-md-4">
    <div> {{session('message')}} </div>
  </div>
<div class="col-md-10">


    @foreach ($dishes as $dish)
        <div class="col-md-4">
		    <div class="panel panel-default">
                <div class="panel-heading"><strong><a class="post-title" href="#">{{ $dish->title }}</a></strong></div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="thumbnail">
                            <img src="/storage/image/{{$dish->photo}}" class="img-responsive"></a>
                            </div>
                        </div>
                            <p>{{$dish->description}}</p>

                    </div>
                <div class="panel-footer">
                  <a href="{{ route ('dish.edit', $dish) }}">
                    <button type="button" class="btn btn-primary float-right" name="button">Edit</button> </a>
                    <form action="{{ route('dish.destroy', $dish) }}" method="POST"
                        style="display: inline"
                        onsubmit="return confirm('Are you sure?');">
                      <input type="hidden" name="_method" value="DELETE">
                      {{ csrf_field() }}
                      <button class="btn btn-danger pull-right">Delete</button>
                    </form>                </div>
            </div>
        </div>
        @endforeach
	</div>

<li class="btn btn-default"> <a href="{{route('admin')}}" class="btn btn-default">Atgal </a> </li>
<li class="btn btn-default"><a href="{{route('dish.create')}}" class="btn btn-default">Sukurti</a> </li> </div>
 @endsection
