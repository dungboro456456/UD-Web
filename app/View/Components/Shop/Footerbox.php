<?php

namespace App\View\Components\Shop;

use App\Models\Page;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footerbox extends Component
{
    public $links;
    public function __construct($position)
    {
        $this->links=Page::select('title','slug')->where('position',$position)->get();

    }

   
    public function render()
    {
        return view('components.shop.footerbox',['links'=>$this->links]);
    }
}
