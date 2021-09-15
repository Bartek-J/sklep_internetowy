<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    const YES = 'yes';
    const NO = 'no';

    public function isActive()
    {
        return $this->active == self::YES;
    }
    public function scopeActive($query)
    {
        return $query->where('active', '=', self::YES);
    }
}
