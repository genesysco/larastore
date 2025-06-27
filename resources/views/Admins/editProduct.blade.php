@extends('Admins.base')
@section('metaTag')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', "Edit Product")
@section('enPageTitle', "Edit Product")
@section('faPageTitle', "ویرایش محصول")



@section('content')
	<div class="bg-white dark:!bg-sky-900 rounded-md shadow-sm p-8 w-full mt-8">
	    <!-- Form -->
	    <form action="/administrator/updateProduct/{{$product->id}}" method="POST" novalidate  enctype="multipart/form-data">
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
	          value="{{$product->name}}"
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
	          value="{{$product->short_description}}"
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
	        >{{$product->description}}</textarea>
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
	          value="{{$product->price}}"
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
	          value="{{$product->stock}}"
	        />
	        @error('stock')
	          <p class="text-sm text-pink-300">{{$message}}</p>
	        @enderror
	      </div>


	      <!-- Product Image URL -->
	      <div class="mb-4">
	        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="product-image">
	          <span class="en">
	            Product Images
	          </span>
	          <span class="fa hidden">
	            عکس های محصول
	          </span>
	        </label>
		      <div class="mb-2 flex flex-wrap items-center gap-3" id="productImages">
		      	@foreach($product->images as $i)
			      	<div class="w-20" id="{{$i->id}}">
			      		<a href="{{asset('storage/' . $i->image_path)}}" target="_blank">
				      		<img src="{{asset('storage/' . $i->image_path)}}" class="rounded-md">
			      		</a>
			      		<p class="text-sm text-pink-400 cursor-pointer text-center imageRemover" data-id="{{$i->id}}">
			      			Delete this image 
			      			<i class="bi bi-exclamation-diamond-fill"></i>
			      		</p>
			      	</div>
		      	@endforeach
		      </div>
	        <input
	          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
	          type="file"
	          id="images"
	          placeholder="Enter image URL"
	          required
	          multiple
	          name="images[]"
	          accept="image/*"
	          data-id='{{$product->id}}'
	        />
	        <div role="status" id="loading" class="hidden">
				    <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
				        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
				        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
				    </svg>
				    <span class="text-gray-400">Uploading image, please wait ...</span>
				</div>
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
	        class="bg-pink-200 text-pink-400 py-2 px-4 rounded-lg hover:bg-pink-300 hover:text-pink-500 duration-300 me-2"
	        type="submit"
	      >
	        <span class="en">
	          Update Product
	        </span>
	        <span class="fa hidden">
	          بروز رسانی محصول
	        </span>
	      </button>
	      <a href="/administrator/products" class="text-sky-300 hover:underline">
	      	<span class="en">
	      		Go to products section !
	      	</span>
	      	<span class="fa hidden">
	      		برو به صفحه محصولات
	      	</span>
	      </a>
	    </form>
	</div>
@endsection

@section('script')
	<script src="/js/showCategory.js"></script>
	<script src="/js/deleteImage.js"></script>
	<script src="/js/uploadImage.js"></script>
@endsection