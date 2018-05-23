<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
 public  function color() {
        return $this->belongsTo('App\Color', 'color_id');
    }
     public  function serial() {
        return $this->belongsTo('App\Serial', 'serial_id');
    }
    public  function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }
     public  function size() {
        return $this->belongsTo('App\Size', 'size_id');
    }
    
    
}
