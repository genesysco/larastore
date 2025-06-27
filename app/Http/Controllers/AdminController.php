<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function administrator(){
        $totalProducts = Product::count();
        $topCategoryNumber = Product::select('category_id', DB::raw('count(*) as total'))
        ->groupBy('category_id')
        ->orderByDesc('total')
        ->with('category')
        ->first();
        $categoryName = $topCategoryNumber?->category->name ?? 'None';
        $productsThisMonth = Product::whereMonth('created_at', now()->month)
        ->count();
        return view('Admins/index',compact('totalProducts','topCategoryNumber','categoryName','productsThisMonth'));
    }



    public function usersList(){
        $users = User::all();
        return view('Admins/usersList',compact('users'));
    }



    public function deleteUser($id)
    {
        $deleteOpt = User::where('id', $id)->delete();
        if($deleteOpt)
            return true;
        else
            return false;
    }



    public function promoteUser($id)
    {
        $user = User::where('id', $id)->first();
        if($user->is_admin == 0)
        {
            $promotion = User::where('id',$id)->Update([
                'is_admin' => 1
            ]);
            if($promotion)
                return true;
            else
                return false;
        }
        else
            return false;
    }



    public function deposeUser($id)
    {
        $user = User::where('id', $id)->first();
        if($user->is_admin == 1)
        {
            $promotion = User::where('id',$id)->Update([
                'is_admin' => 0
            ]);
            if($promotion)
                return true;
            else
                return false;
        }
        else
            return false;
    }


    // ---------------------------------------------------- Categories
    public function categories(){
        $categories = Category::all();
        return view('Admins/categories', compact('categories'));
    }



    public function addCategory(Request $request){


        $insertion = Category::create([
            "name" => $request->category,
            "parent_id" => $request->parentId
        ]);
        if($insertion)
            return $insertion;
        else
            return false;
    }



    public function removeCategory($id){
        $destruction = Category::where('id',$id)->delete();
        if($destruction)
            return true;
        else
            return false;
    }



    public function editCategory($catId){
        $categories = Category::all();
        $thisCategory = Category::where('id',$catId)->first();
        return view('Admins/editCategory', compact('categories', 'thisCategory'));
    }



    public function updateCategory(Request $request){

        $update = Category::where('id',$request->id)->Update([
            'name' => $request->catName,
            'parent_id' => $request->subCategoryof
        ]);

        if($update)
            return redirect('/administrator/categories')->with('success','Category updated successfully!');
        else
            return redirect()->back()->with('error','Error on Updating!');
    }

    


    // -------------------------------------------- Products
    public function products(){
        $products = Product::with(['category','subCategory'])->get();
        return view('Admins/products',compact('products'));
    }



    public function addProduct(){
        $categories = Category::all();
        return view('Admins/addProduct', compact('categories'));
    }



    public function insertProduct(Request $request){
        
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'shortDescription' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'images' => 'required|array',
            'images.*' => 'image|max:2048',
            'category' => 'required'
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $request->subCategory == 'null' ? $subCategory = null : $subCategory = $request->subCategory;

   
        $insert = Product::create([
            'name' => $request->name,
            'short_description' => $request->shortDescription,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category,
            'subCategory_id' => $subCategory,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $insert->images()->create([
                    'image_path' => $path
                ]);
            }
        }

        if($insert)
            return redirect('/administrator/products');
    }



    public function deleteProduct($id){
        $removed = Product::where('id', $id)->delete();

        if($removed)
            return true;
        else
            return false;
    }



    public function editProduct($id){
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        return view('Admins/editProduct', compact('product','categories'));
    }



    public function deleteImage($id){
        $image = Image::find($id);
        $filePath = storage_path('app/public/' .$image->image_path);
        unlink($filePath);

        $removed = Image::where('id',$id)->delete();
        if($removed)
            return true;
        else
            return false;
    }



    public function imageAjax(Request $request){
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|max:2048'
        ]);

        $details = [];

        foreach ($request->file('images') as $image) {
            $path = $image->store('products', 'public');
            $inserted = Image::create([
                'product_id' => $request->id,
                'image_path' => $path
            ]);

            $details[] = [
                'id' => $inserted->id,
                'path' => $path
            ];
        }

        return response()->json([
            'success' => true,
            'message' => 'Images uploaded successfully!',
            'details' => $details
        ]);
    }



    public function updateProduct(Request $request,$id){
        
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'shortDescription' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required'
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $request->subCategory == 'null' ? $subCategory = null : $subCategory = $request->subCategory;

   
        $insert = Product::where('id',$id)->Update([
            'name' => $request->name,
            'short_description' => $request->shortDescription,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category,
            'subCategory_id' => $subCategory,
        ]);

        if($insert)
            return redirect('/administrator/products');
    }
}