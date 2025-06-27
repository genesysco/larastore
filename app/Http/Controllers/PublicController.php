<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class PublicController extends Controller
{
    public function homePage(){
        $categories = Category::all();
        return view('index', compact('categories'));
    }



    public function categorizedProducts($id){
        $p = Product::where('category_id',$id)
        ->orWhere('subCategory_id',$id)
        ->get();
        return view('Users/categorizedProducts', compact('p'));
    }



    public function singleProduct($id){
        $p = Product::where('id',$id)->first();
        return view('Users/singleProduct', compact('p'));
    }



    public function allProducts()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('Users/allProducts', compact('products','categories'));
    }



    public function search(Request $request){
        $query = Product::query();

        if($request->filled('pName') && $request->filled('category') && $request->filled('subCategory'))
        {
            $query->where('name','like','%'.$request->pName.'%')
                ->where('category_id', $request->category)
                ->where('subCategory_id', $request->subCategory);
        }
        elseif($request->filled('category') && $request->filled('subCategory'))
        {
            $query->orWhere('category_id', $request->category)
            ->where('subCategory_id', $request->subCategory);
        }
        elseif($request->filled('pName') && $request->filled('category'))
        {
            $query->where('name','like','%'.$request->pName.'%')
                ->where('category_id', $request->category);
        }
        elseif($request->filled('pName'))
        {
            $query->where('name','like','%'.$request->pName.'%');
        }
        elseif ($request->filled('category'))
        {
            $query->orWhere('category_id', $request->category);
        }
        elseif($request->filled('subCategory'))
        {
            $query->orWhere('subCategory_id', $request->subCategory);
        }


        $result = $query->with(['images', 'category', 'subCategory'])->get();

        return $result;
    }
}
