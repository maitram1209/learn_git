<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','ra_user_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Products','ra_product_id');
    }
}
