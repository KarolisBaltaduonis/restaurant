<?php

namespace App\Http\Controllers;

use\App\Cart;
use\App\Dish;
use\App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
  public function ajaxAdd(Request $request)
  {
    $id = $request->input('id');
    $dish=Dish::findorFail($id);
    $oldCart = Session::has('cart')? Session::get('cart') : null;
    if(Session::has('cart')) {
      $oldCart = Session::get('cart');
      // {
      //   else {
      //     $oldcart = null;
      //   }
      // }
    }
    $cart = new Cart($oldCart);
    $cart->add($dish, $dish->id);
    $request->session()->put('cart',$cart);
    // Session::put('cart', $cart);
    echo json_encode($cart);
    // return json_encode($cart);
  }
  public function index() {
    $cart = Session::has('cart')? Session::get('cart'):null;

    return view ('cart.order', compact('cart'));
  }

  public function deleteByOne(Request $request, $id)
  {
    $oldCart = Session::has('cart')? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->deleteByOne($id);
    $request->session()->put('cart', $cart);
    return view('cart.order', compact('cart'));
  }

  public function deleteAll()
  {
    Session::forget('cart');
    Return redirect('/cart2')->with(['message'=>'Dish edit success']);  //
  }
  public function deleteAllRow(Request $request, $id)
  {
    $oldCart = Session::has('cart')? Session::get('cart') : null;

    $cart = new Cart($oldCart);
    // dd($cart);
    $cart->deleteAllRow($id);
    $request->session()->put('cart', $cart);
    return view('cart.order', compact('cart'));
  }
}
