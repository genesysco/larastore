@extends('Admins.base')
@section('title', "Add new Products")
@section('enPageTitle', "Add New Products")
@section('faPageTitle', "اضافه کردن محصولات جدید")



@section('content')
	<div class="bg-white dark:!bg-sky-900 rounded-md shadow-sm p-8 w-full mt-8">

    @if(session()->has('error'))
      <div class="bg-red-300 border-red-500">
        <p class="text-red-500">{{session('error')}}</p>
      </div>
    @endif
    
    <!-- Form -->
    <form action="/administrator/insertProduct" method="POST" enctype="multipart/form-data">
      @csrf
      <!-- Product Name -->
      <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="product-name">
          <span class="en">
            Product Name
          </span>
          <span class="fa hidden">
            نام محصول
          </span>
        </label>
        <input
          class="w-full dark:bg-gray-900 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-gray-300"
          type="text"
          id="product-name"
          placeholder="Enter product name"
          required
          name="name"
          value="{{old('name')}}"
        />
        @error('name')
          <p class="text-sm text-pink-300">{{$message}}</p>
        @enderror
      </div>

      <!-- Product Short description -->
      <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="product-Short-Description">
          <span class="en">
            Product Short Description
          </span>
          <span class="fa hidden">
            توضیحات مختصر محصول
          </span>
        </label>
        <input
          class="w-full dark:bg-gray-900 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-gray-300"
          type="text"
          id="product-Short-Description"
          placeholder="Enter product short description"
          required
          name="shortDescription"
          value="{{old('shortDescription')}}"
        />
        @error('shortDescription')
          <p class="text-sm text-pink-300">{{$message}}</p>
        @enderror
      </div>

      <!-- Product Description -->
      <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="product-description">
          <span class="en">
            Product Description
          </span>
          <span class="fa hidden">
            توضیحات محصول
          </span>
        </label>
        <textarea
          class="w-full dark:bg-gray-900 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-gray-300"
          id="product-description"
          rows="4"
          placeholder="Enter product description"
          required
          name="description"
        >{{old('description')}}</textarea>
        @error('description')
          <p class="text-sm text-pink-300">{{$message}}</p>
        @enderror
      </div>

      <!-- Product Price -->
      <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="product-price">
          <span class="en">
            Product Price
          </span>
          <span class="fa hidden">
            قیمت محصول
          </span>
        </label>
        <input
          class="w-full dark:bg-gray-900 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-gray-300"
          type="text"
          id="product-price"
          placeholder="Enter product price"
          required
          name="price"
          value="{{old('price')}}"
        />
        @error('price')
          <p class="text-sm text-pink-300">{{$message}}</p>
        @enderror
      </div>

      <!-- In stock -->
      <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="pStock">
          <span class="en">
            In stock
          </span>
          <span class="fa hidden">
            موجود در انبار
          </span>
        </label>
        <input
          class="w-full dark:bg-gray-900 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-gray-300"
          type="number"
          id="pStock"
          placeholder="Enter product number"
          required
          name="stock"
          value="{{old('stock')}}"
        />
        @error('stock')
          <p class="text-sm text-pink-300">{{$message}}</p>
        @enderror
      </div>

      <!-- Product Image URL -->
      <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="product-image">
          <span class="en">
            Product Image
          </span>
          <span class="fa hidden">
            عکس های محصول
          </span>
        </label>
        <input
          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          type="file"
          id="images"
          placeholder="Enter image URL"
          required
          multiple
          name="images[]"
          accept="image/*"
        />
        @error('images')
          <p class="text-sm text-pink-300">{{$message}}</p>
        @enderror
      </div>

      <!-- Categories -->
      <div class="mb-6 flex gap-x-2">
        <div>
          <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
          <span class="en">
            Category
          </span>
          <span class="fa hidden">
            دسته بندی
          </span>
          </label>
          <select class="px-3 py-2 dark:bg-gray-900 dark:text-gray-300 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="categories" name="category">
              <option value="">Select Category</option>
            @foreach($categories as $category)
              @if($category->parent == null)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endif
            @endforeach
          </select>
          @error('category')
            <p class="text-pink-300">{{$message}}</p>
          @enderror
        </div>
        <div class="hidden" id="subCategory">
          <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
            <span class="en">
              Subcategory
            </span>
            <span class="fa hidden">
              زیر دسته بندی
            </span>
          </label>
          <select class="px-3 py-2 dark:bg-gray-900 dark:text-gray-300 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="selectedSubcategory" name="subCategory">
              <option value="">Select Subcategory</option>
            @foreach($categories as $category)
              @if($category->parent_id != null)
                <option class="subCategories hidden" value="{{$category->id}}" data-parentId="{{$category->parent_id}}">
                  {{$category->name}}
                </option>
              @endif
            @endforeach
          </select>
        </div>
      </div>

      <!-- Submit Button -->
      <button
        class="bg-pink-200 text-pink-400 py-2 px-4 rounded-lg hover:bg-pink-300 hover:text-pink-500 duration-300"
        type="submit"
      >
        <span class="en">
          Add Product
        </span>
        <span class="fa hidden">
          اضافه کردن محصول
        </span>
      </button>
    </form>
  </div>
@endsection

@section('script')
  <script src="/js/showCategory.js"></script>
@endsection