<?php

namespace App\View\Components\Shop;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SpecialProductBox extends Component
{
public $products;
public $title;
public $type;
    public function __construct($type,$title)
    {
        $this->products=Product::where('type',$type)->limit(8)->get();
        $this->title=$title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shop.special-product-box',['products'=>$this->products,'title'=>$this->title]);
    }
}
