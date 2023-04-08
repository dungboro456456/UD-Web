<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::paginate(10);
        return view('admin.product.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Product::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'product_name'=>['required','unique:products','max:255'],
            'slug'=>['required','unique:products','max:255'],
        ]);
        Product::create($request->post());
        return redirect(route('products.index'))->with('success','Product has been create successfully.');
    }
     public function show(Product $product)
     {
           //Hiển thị chi tiết một sản phẩm
           return view('admin.product.show',compact('product'));
     }
 
     public function edit(Product $product)
     {
        $categories=Category::all();
        return view('admin.product.edit',compact('product','categories'));
     }
 
     public function update(Request $request, Product $product)
     {
        $validate=$request->validate([
            'product_name'=>['required','unique:products','max:255'],
            'slug'=>['required','unique:products','max:255'],
        ]);
         $product->fill($request->post())->save();
         return redirect(route('products.index'))->with('success','Product has been update successfully.');
   
     }
 
     public function destroy(Product $product)
     {
         //
         $product->delete();
         return redirect(route('products.index'))->with('success','Product has been delete successfully.');
    
     }
     public function trash(){
        $products=Product::onlyTrashed()->paginate(10);
        return view('admin.product.trash',compact('products'));

     }
    public function remove($id){
        Product::withTrashed()->find($id)->forceDelete();
        return redirect(route('product.trash'))->with('success','Product has been remove successfully.');
    }
    public function restore($id){
        Product::withTrashed()->find($id)->restore();
        return redirect(route('product.trash'))->with('success','Product has been restore successfully.');
    }
    }