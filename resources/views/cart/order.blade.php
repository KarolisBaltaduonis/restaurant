@extends('layouts.app')
@section('content')
<div class="container">

  <table class="table">

    <tbody>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Preke</th>
        <th scope="col">Kiekis</th>
        <th scope="col">Kaina</th>
      </tr>
    </thead>
    <tbody>
      @if($cart)
      @foreach ($cart->items as $item)
      <tr>
        <th scope="row">1</th>
        <td>{{$item['item']['title']}}</td>
        <td>{{$item['qty']}} <a href="{{ route('cart.deleteByOne', $item['item']['id']) }}"
          class="btn btn-danger">Delete</a>



          <a href="{{ route('cart.deleteAllRow', $item['item']['id']) }}" class="btn btn-danger"> Delete all </a></td>

        <td>{{$item['price']}}</td>
      </tr>

      @endforeach
    <tr>
      <th scope="row"></th>
      <td></td>

     <td  > <strong> {{$cart->totalQty}} </strong></td>
     <td> <strong> {{$cart->totalPrice}} </strong></td>
      <a href="{{ route('cart.deleteAll') }}" class="btn btn-danger"> Delete all </a></td>
     @else
     <tr>
       <td>Krepselis tuscias</td>
     </tr>
     @endif


    </tr>
    </tbody>
  </table>
  <div class="container">
  <div class="row">
        <div class="panel-footer">
          <div class="row text-center">
            <div class="col-xs-9">
              <h4 class="text-right">Total <strong>${{$cart->totalPrice}}</strong></h4>
            </div>
            <div class="col-xs-3">
              <a href="{{ route('cart.checkout') }}" type="button" class="btn btn-success btn-block">
                Checkout
              </a>
            </div>
          </div>
        </div>
      </div>
</div>

  @endsection
