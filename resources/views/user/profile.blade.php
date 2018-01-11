@extends('layouts.app')
@section ('content')
<div class="container">

  <h2> user orders </h2>
@foreach ($orders as $order)

<div class="panel panel-default">
  <div class="panel-heading">{{ $order->created_at }}</div>
  <div class="panel-body">
    @foreach($order->cart->items as $item)
    <ul class="list-group">
        <li class="list-group-item">{{ $item['item']['title'] }} kiekis: {{ $item['qty'] }} kaina: {{ $item['price'] }}</li>

      </ul>
    @endforeach

  Visas kiekis  {{ $order->cart->totalQty }}
  Visa suma {{$order->cart->totalPrice }}

</div>
</div>


@endforeach

</div>


@endsection
