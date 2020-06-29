<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
  protected $fillable = [
        'lable',
        'rating',
        'brewery_id'
    ];
    public function brewery()
    {
        return $this->belongsTo('App\Brewery');
    }
}
