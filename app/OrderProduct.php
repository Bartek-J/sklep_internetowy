<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = false;
    protected $fillable=['product_id' , 'quantity' , 'format'];
   public function product()
   {
       return $this->belongsTo('App\product');
   }

}
