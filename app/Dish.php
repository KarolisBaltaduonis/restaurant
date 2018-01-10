<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
  protected $fillable = [
    'title', 'price', 'description', 'menu_id', 'photo'
  ]; 
  public function menu()
  {
    return $this->belongsTo('App\Menu');
  }
}
