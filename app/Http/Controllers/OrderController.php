<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Mail\OrderCheckout;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
  public function checkout() {
    $cart = Session::get('cart');
    $order = new Order;
    $order->cart = serialize($cart);
    Auth::user()->orders()->save($order);
    Mail::to(Auth::user())->send(new OrderCheckout($cart));
    Session::forget('cart');

    return redirect()->route('home')->with(['message'=>'Thanks for your purchase']);
  }

  public function profile()
  {
    $orders = Auth::user()->orders();

    $orders -> transform(function($order,$key){
      $order -> cart = unserialize ($order->cart);
      return $order;
  });
  $orders->all();

  return view('user.profile', compact('orders'));
}
}
