@extends('layouts.app')
@section('content')
<div class="container">
  @if ($errors->count()>0)
  @foreach ($errors->all() as $error)
  <li > {{ $error }}  </li>
  @endforeach
  @endif
<form class="form-horizontal" action = "{{ route('reservation.store') }}" method="post">
  {{ csrf_field() }}


<!-- Form Name -->
<legend>Rezervacija</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Person count</label>
  <div class="col-md-4">
  <input  name="person_count" type="number" placeholder="Person count" class="form-control input-md">

  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Time</label>
  <div class="col-md-4">
  <input name="time" type="time" placeholder="Enter your time" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">date</label>
  <div class="col-md-4">
  <input id="textinput" name="date" type="date" placeholder="Enter your date" class="form-control input-md">

  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="button1id" name="button1id" class="btn btn-primary">SUBMIT</button>
    <button id="button2id" name="button2id" class="btn btn-warning">CANCEL</button>
  </div>
</div>

</form>

</div>

<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>

  <script>

      $(document).ready(function () {
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('a.cart').click(function() {
          var dish_id = $(this).data('id');
          var url = "/cart";
          console.log(dish_id);
          $.ajax({
            type:'Post',
            url: url,
            data:{id:dish_id},
            dataType: 'json',
            success: function (data) {
              console.log(data);
            },
            error: function (data) {
              console.log('Error: ',data)
            }
          });
        });
      });

  </script>
@endsection
