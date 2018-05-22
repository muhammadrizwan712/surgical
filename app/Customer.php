<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     public  function token() {
        return $this->belongsTo('App\Token', 'token_id');
    }
}
