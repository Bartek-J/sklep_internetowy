<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cerbero\QueryFilters\FiltersRecords;

class Product extends Model
{
    use FiltersRecords;
    const Y = 'yes';
    const N = 'no';
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }
    public function scopeActive($query)
    {
        return $query->where('active', '=', self::Y);
    }
    public function scopeInactive($query)
    {
        return $query->where('active', '=', self::N);
    }
    
}
