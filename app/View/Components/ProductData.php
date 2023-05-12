<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Product;

class ProductData extends Component
{
    /**
     * Create a new component instance.
     */

     public $products;
      

    public function __construct()
    {
        $this->products = Product::all();
    }
    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-data');
    }
}
