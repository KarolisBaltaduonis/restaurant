@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-4">
          <div class='alert-success'> {{session('message')}} </div>
        </div>
      <div class="col-md-10">


        <div class="col-md-12">
          @foreach ($dishes as $dish)
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="thumbnail" >
					<img src="/storage/image/{{$dish->photo}}" class="img-responsive">
					<div class="caption">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-4 price">
    							<h3 style="margin:5px auto;"><label>{{ $dish->price }}</label></h3>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<a href="#" data-id="{{$dish->id}}" class="cart btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Add 2 Cart</a>
    						</div>
						</div>

						<p> </p>
					</div>
				</div>
			</div>
      @endforeach
    </div>

  </div>
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
          // console.log(dish_id);
          $.ajax({
            type:'Post',
            url: url,
            data:{id:dish_id},
            dataType: 'json',
            success: function (data) {
              console.log(data.totalQty);
              $('#totalQty').html(data.totalQty);
            },
            error: function (data) {
              console.log('Error: ',data)
            }
          });
        });
      });

  </script>

@endsection
