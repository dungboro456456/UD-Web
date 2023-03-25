<?php

namespace App\View\Components\Shop;

use App\Models\category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryMenu extends Component
{
    public $categories;
    public function __construct()
    {
        $this->categories=category::where('status',1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shop.category-menu',['categories',$this->categories]);
    }
}
