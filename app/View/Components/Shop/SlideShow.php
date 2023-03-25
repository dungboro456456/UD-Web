<?php

namespace App\View\Components\Shop;

use App\Models\Image;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SlideShow extends Component
{
    public $images;
    public function __construct()
    {
        $this->images=Image::where('position',1)->get();
    }

    
    public function render(): View|Closure|string
    {
        return view('components.shop.slide-show',['images'=>$this->images]);
    }
}
