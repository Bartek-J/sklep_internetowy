<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING = 'pending';
    const PAID = 'paid';
    const SENT = 'sent';
    const DONE = 'done';

    public function isPending()
    {
        return $this->status == self::PENDING;
    }
    public function isPaid()
    {
        return $this->status == self::PAID;             
    }
    public function isSent()
    {
        return $this->status == self::SENT;             
    }
    public function isDone()
    {
        return $this->status == self::DONE;             
    }
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function dostawy()
    {
        return $this->belongsTo(Shipping::class, 'shipping_id', 'id');
    }
    
}
