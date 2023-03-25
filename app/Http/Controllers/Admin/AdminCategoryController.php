<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::paginate(10);
        return view('admin.category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'cat_name'=>['required','unique:categories','max:255'],
            'slug'=>['required','unique:categories','max:255'],
        ]);
        Category::create($request->post());
        return redirect(route('categories.index'))->with('success','Category has been create successfully.');
    }
     public function show(Category $category)
     {
           //Hiển thị chi tiết một sản phẩm
           return view('admin.category.show',compact('category'));
     }
 
     public function edit(Category $category)
     {
        $categories=Category::all();
        return view('admin.category.edit',compact('category','categories'));
     }
 
     public function update(Request $request, Category $category)
     {
         //
         $category->fill($request->post())->save();
         return redirect(route('categories.index'))->with('success','Category has been update successfully.');
   
     }
 
     public function destroy(Category $category)
     {
         //
         $category->delete();
         return redirect(route('categories.index'))->with('success','Category has been delete successfully.');
    
     }
     public function trash(){
        $categories=Category::onlyTrashed()->paginate(10);
        return view('admin.category.trash',compact('categories'));

     }
    public function remove($id){
        Category::withTrashed()->find($id)->forceDelete();
        return redirect(route('category.trash'))->with('success','Category has been remove successfully.');
    }
    public function restore($id){
        Category::withTrashed()->find($id)->restore();
        return redirect(route('category.trash'))->with('success','Category has been restore successfully.');
    }
    }