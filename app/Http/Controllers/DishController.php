<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Menu;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;




class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $dishes = Dish::all();  //
     return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('create', Dish::class);
      $menus= Menu::all();
      return view('admin.dish.create', compact('menus'));  //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $name = $request->file('photo')->getClientOriginalName();
      Image::make(Input::file('photo'))->resize(null, 200, function ($constraint) {
    $constraint->aspectRatio();
})->save(storage_path('app/public/image/'.$name));

      // $path = $request->file('photo')->storeAs('public/image', $name);
      $dish = new Dish();
      $dish->title = $request->title;
      $dish->price = $request->price;
      $dish->description = $request->description;
      $dish->menu_id = $request->menu_id;
      $dish->photo = $name;
      $dish->save();

      Return redirect('admin/dish')->with(['message'=>'Dish edit success']);  //
    //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
    $this->authorize('update', Dish::class);
    $menus= Menu::all();
    return view ('admin.dish.edit',compact('menus', 'dish'));    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {

      $this->authorize('update', Dish::class);
      // dd($request);

      if($request->file('photo')) {


      // dd($path);
      $path_old ='/public/image';

      if (!empty($dish->photo)) {
        // dd('public/image/'.$dish->photo);
        Storage::delete('public/image/'.$dish->photo);
      }
      $name = $request->file('photo')->getClientOriginalName();
      Image::make(Input::file('photo'))->resize(300, 200)->save(storage_path('app/public/image/'.$name));      $dish->photo = $name;
    }

      $dish->title = $request->title;
      $dish->price = $request->price;
      $dish->description = $request->description;
      $dish->menu_id = $request->menu_id;
      $dish->update();

      Return redirect('admin/dish')->with(['message'=>'Dish edit success']);  //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
      $this->authorize('delete', Dish::class);
      if (!empty($dish->photo)) {
        // dd('public/image/'.$dish->photo);
        Storage::delete('public/image/'.$dish->photo);
      }

      $dish->delete();
      Return redirect('admin/dish')->with(['message'=>'Delete success']);    //
    }
}
