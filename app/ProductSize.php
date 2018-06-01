<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
   public  function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }
     public  function size() {
        return $this->belongsTo('App\Size', 'size_id');
    }
}
