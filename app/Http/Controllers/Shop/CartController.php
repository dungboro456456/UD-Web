<?php

namespace App\Http\Controllers\Shop;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        if(Cart::count()==0)
        return view('shop.shopcart.cart_emty');
        else return view('shop.shopcart.cart');
    }
    public function add($id)
    {
        $product=Product::where('id',$id)->first();
        Cart::add([
            'id'=>$product->id,
            'name'=>$product->product_name,
            'price'=>$product->price,
            'qty'=>1,
            'weight'=>0,
            'options'=>[
                'image'=>$product->image
            ]
            ]);
            return redirect()->back();
    }
    public function delete($row_id)
    {
        Cart::remove($row_id);
        return redirect(route('shop.shopcart.cart'));
    }


}
