<?php

namespace App\QueryFilters;
use Cerbero\QueryFilters\QueryFilters;

class ProductFilters extends QueryFilters
{
    public function name($pharse)
    {
        $this->query->where('name', 'like' , '%' .$pharse. '%');
    }
    public function from($price)
    {
         $this->query->where('price', '>=',$price*100);
    }
    public function to($price)
    {
        $this->query->where('price', '<=', $price*100);
    }
}