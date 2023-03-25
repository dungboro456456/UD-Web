<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data=product::get();
        return(view('shop.product.index',['products'=>$data]));
    }
    public function showBySlug($slug)

    {
        $product=Product::where('slug',$slug)->first();
        return view('shop.show_by_slug',['product'=>$product]);
    }
}
