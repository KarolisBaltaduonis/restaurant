<h1> {{$name}} Your payment accepted </h1>
@foreach ($cart->items as $item)
<p> {{$item['item']['title'] }}: kiekis {{ $item['qty'] }}, kaina {{ $item['price'] }}$</p>
@endforeach
Viso sumokejot: {{ $cart->totalPrice }}$
Viso prekiu: {{ $cart->totalQty }}
