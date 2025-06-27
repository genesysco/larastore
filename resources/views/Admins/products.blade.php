@extends('Admins.base')
@section('title', "Products")
@section('enPageTitle', "Products")
@section('faPageTitle', "محصولات")



@section('content')
	<a href="/administrator/addProduct" class="bg-pink-200 p-2 rounded-md text-pink-400 my-8 inline-block hover:text-pink-600 hover:bg-pink-300 duration-500">
		<span class="en">Add new products</span>
		<span class="fa hidden">اضافه کردن محصولات جدید</span>
	</a>


	<!-- =================== Products -->
	<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">

		@foreach($products as $p)
		<!-- Product Card -->
		<div class="bg-white dark:!bg-sky-900 rounded-md shadow-sm overflow-hidden" id="{{$p->id}}">
		<!-- Product Image -->
			<img 
			  class="w-full h-48 object-cover" 
			  src="{{$p->images->isNotEmpty() ? asset('storage/' . $p->images->first()->image_path) : asset('/images/emptyProduct.jpg') }}" 
			  alt="Product Image"
			/>

			<!-- Product Details -->
			<div class="p-6">
			  <!-- Product Title -->
			  <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-300 mb-2">{{$p->name}}</h2>
			  
			  <!-- Product Description -->
			  <p class="text-gray-600 text-sm mb-4 dark:text-gray-400">
			    {{$p->short_description}}
			  </p>
			  
			  <!-- Price and Add to Cart Button -->
			  <div class="flex items-center justify-between">
			    <!-- Price -->
			    <span class="text-lg font-bold text-gray-900 dark:text-gray-300">${{$p->price}}</span>
			    
			    <div>
			    	<!-- Buttons -->
				    <a href="/administrator/editProduct/{{$p->id}}" class="bg-sky-200 text-sky-400 hover:text-sky-600 p-2 rounded hover:bg-sky-300 me-1">
				      <span class="bi bi-pencil"></span>
				    </a>

				    <button class="bg-rose-200 text-rose-400 hover:text-rose-600 py-1.5 px-2 rounded hover:bg-rose-300 transition-colors duration-300 removeProduct" data-id="{{$p->id}}" data-pName="{{$p->name}}">
				      <span class="bi bi-trash"></span>
				    </button>
			    </div>
			  </div>
				<div class="mt-2">
					<span class="text-white text-sm bg-gray-400 rounded-md p-1 me-1">
						{{$p->category->name}}
					</span>
					@if($p->subCategory?->name != null)
						<span class="text-white text-sm bg-gray-400 rounded-md p-1">
							{{$p->subCategory->name}}
						</span>
					@endif
				</div>
			</div>
		</div>
		<!-- Product Card End-->
		@endforeach

	</div>
	<!-- =================== Products -->
@endsection


@section('script')
	<script src="/js/deleteProduct.js"></script>
@endsection