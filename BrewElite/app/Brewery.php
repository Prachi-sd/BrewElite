<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
  protected $fillable = [
        'name',
        'city'
    ];
    
    public function beers()
    {
      return $this->hasMany('App\Beer');
    }
}
