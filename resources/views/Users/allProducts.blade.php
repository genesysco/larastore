@extends('Users.base')
@section('metaTag')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', "All Products")

@section('content')
<div class="container min-h-screen pt-10">

	<!------------------------------------------------- Search Section ------------------->
	<div class="bg-white p-4 rounded-xl shadow-sm dark:!bg-sky-700">
    <div class="flex flex-col md:flex-row items-center gap-2">
      <!-- Text Input -->
      <input
        type="text"
        placeholder="Search..."
        class="flex-1 w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-400 dark:text-white dark:bg-gray-900 dark:!border-sky-700"
        id="pName"
      />

      <!-- Category Dropdown -->
      <div class="relative w-full md:w-auto">
        <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 bg-white dark:text-white dark:!bg-gray-900 dark:!border-sky-700" id="category">
          <option value="" selected>Category</option>
          @foreach($categories as $c)
            @if($c->parent_id == null)
	          <option value="{{$c->id}}" class="text-gray-700 dark:text-white">
	          	{{$c->name}}
	          </option>
	         @endif
	      @endforeach
        </select>
      </div>

      <!-- Subcategory Dropdown -->
      <div class="relative w-full md:w-auto">
        <select
          class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 bg-white dark:text-white dark:!bg-gray-900 dark:!border-sky-700" id="subCategory"
        >
          <option value="" selected>Subcategory</option>
          @foreach($categories as $c)
            @if($c->parent_id != null)
		          <option value="{{$c->id}}" class="text-gray-700 dark:text-white hidden subCategories" data-parentId="{{$c->parent_id}}">
		          	{{$c->name}}
		          </option>
	          @endif
		      @endforeach
        </select>
      </div>

      <!-- Search Button with Icon -->
      <button class="w-full md:w-auto px-6 py-2 bg-blue-100 text-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center justify-center gap-2 disabled:cursor-not-allowed disabled:opacity-40" id="search">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
        </svg>
        <span>Search</span>
      </button>
    </div>
  </div>
	<!------------------------------------------------- The end of search section ------------------->



	<!-- ------------------------------- Search Results -------------------------- -->
	<div class="mt-10 border-b pb-5 hidden" id="searchBox">
		<div role="status" id="loading" class="text-center">
		    <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-sky-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
		        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
		        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
		    </svg>
		    <span class="ms-2 text-gray-400">Searching ...</span>
		</div>
		<button class="text-2xl text-pink-500 hidden right-[33px] absolute" id="clearResult">
			<span class="bi bi-x-circle-fill"></span>
		</button>

		<p class="text-center text-gray-400 noProducts hidden">No such Products yet!</p>

		<p class="mb-3 h3 searchResult hidden">Search Results :</p>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 hidden" id="searchResult">
		</div>

	</div>
	<!-- ------------------------------- /Search Results -------------------------- -->
	
	@if($products->isEmpty())
		<p class="h3 text-center my-32 text-gray-600 dark:text-gray-300">No such products yet!</p>
	@else
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 pt-10 mb-10">
			@foreach($products as $product)
			<!-- Product Card -->
			<div class="bg-white dark:!bg-sky-900 rounded-md shadow-sm overflow-hidden">
			<!-- Product Image -->
				<img 
				  class="w-full h-48 object-cover" 
				  src="{{$product->images->isNotEmpty() ? asset('storage/' . $product->images->first()->image_path) : asset('/images/emptyProduct.jpg') }}" 
				  alt="Product Image"
				/>

				<!-- Product Details -->
				<div class="p-6">
				  <!-- Product Title -->
				  <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-300 mb-2">{{$product->name}}</h2>
				  
				  <!-- Product Description -->
				  <p class="text-gray-600 text-sm mb-4 dark:text-gray-400">
				    {{$product->short_description}}
				  </p>
				  
				  <!-- Price and Add to Cart Button -->
				  <div class="flex items-center justify-between">
				    <!-- Price -->
				    <span class="text-lg font-bold text-gray-900 dark:text-gray-300">${{$product->price}}</span>
				    
				    <div class="flex">
				    	<!-- Buttons -->
					    <a href="/singleProduct/{{$product->id}}" class="bg-sky-200 text-sky-400 hover:text-sky-600 p-2 rounded hover:bg-sky-300 me-1">
					      <span class="bi bi-eye"></span>
					    </a>
					    <form action="{{ route('cart.add', $product->id) }}" method="POST">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="myCSRF">
							    <input type="hidden" name="quantity" value="1" min="1">
							    <button type="submit" class="bg-green-200 text-green-400 hover:text-green-600 p-2 rounded hover:bg-green-300">
							    	<span class="bi bi-cart"></span>
							    </button>
							</form>
				    </div>
				  </div>
					<div class="mt-2">
						<span class="text-white text-sm bg-gray-400 rounded-md p-1 me-1">
							{{$product->category->name}}
						</span>
						@if($product->subCategory?->name != null)
							<span class="text-white text-sm bg-gray-400 rounded-md p-1">
								{{$product->subCategory->name}}
							</span>
						@endif
					</div>
				</div>
			</div>
			<!-- Product Card End-->
			@endforeach
		</div>
	@endif
</div>
@endsection

@section('script')
	<script src="/js/search.js"></script>
@endsection