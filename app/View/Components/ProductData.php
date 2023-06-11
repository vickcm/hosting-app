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
     *
     * @param  \Illuminate\Database\Eloquent\Collection|Product[]  $products
     * @return void
     */
    public function __construct(public $products)
    {
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.product-data');
    }
}